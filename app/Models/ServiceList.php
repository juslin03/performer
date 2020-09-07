<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceList extends Model
{
    protected $table = 'servicelists';

    protected $fillable = [
        'service_category_id',
        'title',
        'description',
        'price',
        'duration',
    ];

    public function service_category()
    {
        return $this->belongsTo(
            ServiceCategory::class,
            'service_category_id',
            'id'
        );
    }
}
