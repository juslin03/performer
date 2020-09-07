<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $table = 'evenements';

    protected $fillable = [
        'user_id',
        'e_title',
        'e_desc',
        'e_date',
        'e_place',
        'e_img',
        'e_file_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
