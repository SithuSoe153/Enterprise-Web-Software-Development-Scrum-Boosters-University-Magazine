<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'open_date', 'closure_date', 'final_date'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}