<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Concerns\Flagable;

class Department extends Model
{
    use Flagable;
    protected $appends = ['active'];
    protected $fillable = [
                        'name',
                        'head',
                        'employees_under_work'
                    ];

    public const FLAG_ACTIVE = 1;
    public function getActiveAttribute() {
        return ($this->flags & self::FLAG_ACTIVE) == self::FLAG_ACTIVE;
    }
}
