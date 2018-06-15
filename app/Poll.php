<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Option;

class Poll extends Model
{
    protected $guarded = [];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
