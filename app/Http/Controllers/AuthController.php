<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatusCode;
use App\Http\Requests\ComfirmEmailRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\VerifyOtpRequest;
use App\Http\Resources\UserResource;
use App\Models\Badge;
use App\Models\EmailVerification;
use App\Models\User;
use App\Services\VerificationService;
use Dotenv\Exception\ValidationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class AuthController extends Controller
{
    //
    public function login(LoginRequest $request): JsonResponse
    {
        $request = $request->validated()['data']['attributes'];

        $user = User::where('email', $request['email'])->first();

        if (!$user || !Hash::check($request['password'], $user->password)) {
            throw ValidationValidationException::withMessages([
                'password' => ['Password mismatched'],
            ]);
        }

        $token = $user->createToken("$user->first_name $user->last_name token")->accessToken;

        return $this->success(
            message: 'Login suceessful',
            data: [
                'user' => new UserResource($user),
                'token' => $token,
            ]
        );
    }

    public function register(RegistrationRequest $request): JsonResponse
    {
        $user = User::create($request->validated()['data']['attributes']);

        $user->assignRole('creator administrator');

        $token = $user->createToken("$user->first_name $user->last_name token")->accessToken;

        return $this->success(
            message: 'Registration successful',
            data: ['token' => $token]
        );
    }

    public function registerUsers(RegistrationRequest $request): JsonResponse
    {
        $user = User::create($request->validated()['data']['attributes']);

        $user->assignRole('user');

        $user->wallet()->create();
        /** @var Badge $badge */
        $badge = Badge::where('level','low')->first();

        $user->badges()->attach($badge);

        event(new Registered($user));

        $token = $user->createToken("$user->first_name $user->last_name token")->accessToken;

        return $this->success(
            message: 'Registration successful',
            data: ['token' => $token]
        );
    }


    public function resendOtp(): JsonResponse
    {
        /** @var User */
        $loggedUser = auth()->user();

        VerificationService::generateAndSendOtp($loggedUser);

        return $this->success(
            message: 'OTP resent successfully'
        );
    }

    public function confirmEmail(ComfirmEmailRequest $request): JsonResponse
    {
        /** @var User */
        $user = User::where('email', $request->email)->first();
        VerificationService::generateAndSendOtp($user);

        return $this->success(message: 'A token has be sent to your mail');
    }

    public function verifyForgetonPasswordOtp(VerifyOtpRequest $request): JsonResponse
    {
        /** @var EmailVerification */
        $isValidOtp = EmailVerification::firstWhere(['otp' => $request->otp]);

        if (now()->greaterThan($isValidOtp->expired_at)) {
            return $this->failure(
                message: 'OTP expired',
                status: HttpStatusCode::BAD_REQUEST->value
            );
        }
        $isValidOtp->delete();

        return $this->success(
            message: 'OTP verified successfully'
        );
    }

    public function resetPasword(PasswordResetRequest $request): JsonResponse
    {
        /** @var User @user */
        $user = User::where('email', $request->email)->first()?->withoutRelations();

        $user->fill(['password' => Hash::make($request->password)]);
        $user->save();

        return $this->success(
            message: 'Password  reset successfully',
            data: ['user' => $user]
        );
    }

    public function logout(): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();

        /** @var Token $token */
        $token = $user->token();

        $tokenRepository = app(TokenRepository::class);
        $refreshTokenRepository = app(RefreshTokenRepository::class);

        // Revoke an access token...
        $tokenRepository->revokeAccessToken($token->id);

        // Revoke all of the token's refresh tokens...
        $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($token->id);

        return response()->json(['message' => 'Logged out successfully']);
    }
}