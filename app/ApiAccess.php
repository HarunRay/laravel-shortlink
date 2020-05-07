<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiAccess extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'preview'
    ];

    public function user()
    {
        return $this->belongsTo( User::class );
    }
}
