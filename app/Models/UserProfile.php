<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'avatar_path', 'role'
    ];

    /**
     * Get user's avatar path
     *
     * @return string
     */
    public function getAvatarAttribute(): string
    {
        return asset($this->avatar_path);
    }

    /**
     * Get formated user's fullname
     *
     * @param  string $value
     * @return string
     */
    public function getFullnameAttribute(string $value): string
    {
        return Str::title($value);
    }

    /**
     * Get related user's
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
