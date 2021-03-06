<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'two_factor_type',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activeCode()
    {
        return $this->hasMany(ActiveCode::class);
    }

    public function hasTwoFactorAuthenticatedEnabled()
    {
        return $this->two_factor_type !== 'off';
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }
    public function isOperator()
    {
        return $this->is_operator;
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('name',$permission->name) || $this->hasRole($permission->roles);
    }

    public function hasRole($roles)
    {
        return !! $roles->intersect($this->roles)->all();
    }
}
