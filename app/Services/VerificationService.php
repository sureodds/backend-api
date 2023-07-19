<?php

namespace App\Services;

use App\Models\EmailVerification;
use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Support\Facades\DB;

class VerificationService
{
    public static function generateAndSendOtp(User $user): void
    {
        $otp = rand(1000, 9999);

        DB::transaction(function () use ($user, $otp) {
            EmailVerification::updateOrCreate(
                ['email' => $user->email],
                ['email' => $user->email, 'otp' => $otp, 'expired_at' => now()->addMinutes(10)]
            );

            $user->notify(new EmailVerificationNotification($otp));
        });
    }
}