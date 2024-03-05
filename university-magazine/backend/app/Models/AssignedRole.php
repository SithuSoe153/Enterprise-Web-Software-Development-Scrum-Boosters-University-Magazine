<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignedRole extends Model
{
    protected $fillable = ['user_id', 'role_id', 'faculty_id', 'start_time', 'end_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}