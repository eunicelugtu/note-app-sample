<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title',
        'description',
        'content',
    ];

    public function getContentAttribute($value)
    {
        return decrypt($value);
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = encrypt($value);
    }
}
