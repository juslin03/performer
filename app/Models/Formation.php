<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $table = 'formations';
    protected $fillable = [
        'user_id',
        'f_title',
        'f_desc',
        'f_cover',
        'file_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
