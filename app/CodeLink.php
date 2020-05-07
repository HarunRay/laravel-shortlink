<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeLink extends Model
{
    protected $fillable = [
        'user_id',
        'serial',
        'code',
        'link',
    ];

    public function user()
    {
        return $this->belongsTo( User::class );
    }
}
