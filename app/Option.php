<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'votes';

    protected $guarded = [];

    public function polls()
    {
        return $this->belongsTo(Poll::class, 'poll_id');
    }
}
