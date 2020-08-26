<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeLinkSecret extends Model
{
    protected $fillable = [
        'code_link_id',
        'token',
    ];

    public function code_link()
    {
        return $this->belongsTo( CodeLink::class );
    }
}
