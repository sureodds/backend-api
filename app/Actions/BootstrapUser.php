<?php

namespace App\Actions;

use App\Models\Badge;
use App\Models\User;

class BootstrapUser {
    public static function execute(User $user) : void {
        $user->assignRole('user');

        $user->wallet()->create();
        /** @var Badge $badge */
        $badge = Badge::where('level','low')->first();

        $user->badges()->attach($badge);
    }
}
