<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class EmailVerification extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'email';

    protected $fillable = ['email', 'otp', 'expired_at'];

    public function scopeExpired(Builder $query): Builder
    {
        return $query->where('expired_at', '>', now());
    }
}