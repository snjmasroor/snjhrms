<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Concerns\Flagable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasFactory, Notifiable, Flagable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $appends = ['active', 'admin', 'hr', 'manager', 'employee'];
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public const FLAG_ACTIVE = 1;
    public const FLAG_ADMIN = 2;
    public const FLAG_HR = 4;
    public const FLAG_MANAGER = 8;
    public const FLAG_EMPLOYEE = 16;

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getActiveAttribute() {
        return ($this->flags & self::FLAG_ACTIVE) == self::FLAG_ACTIVE;
    }

    public function getAdminAttribute() {
        return ($this->flags & self::FLAG_ADMIN) == self::FLAG_ADMIN;
    }

    public function getHrAttribute() {
        return ($this->flags & self::FLAG_HR) == self::FLAG_HR;
    }

    public function getManagerAttribute() {
        return ($this->flags & self::FLAG_MANAGER) == self::FLAG_MANAGER;
    }

    public function getEmployeeAttribute() {
        return ($this->flags & self::FLAG_EMPLOYEE) == self::FLAG_EMPLOYEE;
    }
}
