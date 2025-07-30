<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
   protected $fillable = ['uid', 'user_id', 'state', 'type', 'record_time', 'device_ip'];
}
