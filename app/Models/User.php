<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Concerns\Flagable;
// use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasFactory, Notifiable, Flagable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $appends = ['active'];
    protected $fillable = [
        'name', 'email', 'phone', 'username', 'password',
        'branch_id', 'department_id', 'joining_date', 'profile_picture'
        // no need to include 'employee_id' since it's auto-set
    ];
    public const FLAG_ACTIVE = 1;
   

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

  

    protected static function booted()
    {
        static::creating(function ($user) {
            $lastEmployee = static::orderBy('employee_id', 'desc')->first();

            $user->employee_id = $lastEmployee && $lastEmployee->employee_id >= 1000
                ? $lastEmployee->employee_id + 1
                : 1000;
        });
    }

   

}
