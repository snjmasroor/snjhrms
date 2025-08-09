<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Concerns\Flagable;

class Attendance extends Model
{
    use Flagable;
    protected $appends = ['imported'];
    protected $casts = [
      'record_time' => 'datetime',
   ];
    protected $fillable = ['uid', 'user_id', 'state', 'type', 'record_time', 'device_ip'];

   public const FLAG_IMPORTED = 1;

    public function getImportedAttribute() {
        return ($this->flags & self::FLAG_IMPORTED) == self::FLAG_IMPORTED;
    }

    public function getStateNameAttribute()
   {
      $states = [
         0 => 'Check-In',
         1 => 'Check-Out',
         2 => 'Break-Out',
         3 => 'Break-In',
         4 => 'Overtime-In',
         5 => 'Overtime-Out',
      ];
      return $states[$this->state] ?? 'Unknown';
   }

   public function getTypeNameAttribute()
   {
      $types = [
         0 => 'Fingerprint',
         1 => 'Password',
         2 => 'Card',
         3 => 'Fingerprint + Password',
         4 => 'Card + Password',
         5 => 'Fingerprint + Card',
         6 => 'Fingerprint + Card + Password',
      ];
      return $types[$this->type] ?? 'Unknown';
   }

   public function user()
   {
      return $this->belongsTo(User::class, 'user_id', 'employee_id');
   }
}
