<?php

namespace App\Models;

use App\Traits\Friendable;
use App\Traits\Likeable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Likeable;
    use Notifiable;
    use Friendable;
    use TwoFactorAuthenticatable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $with = [
        'profile',
    ];


    public function scopeSuggestions($query)
    {
        return $query->notAuth()->orWhereIn('id', auth()->user()->friends_ids());
    }

    public function scopeNotAuth()
    {
        return $this->where('id', '!=', auth()->id());
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        //this user has many posts
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        //this user has many comments
        return $this->hasMany(Comment::class);
    }
}
