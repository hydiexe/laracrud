<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;
    public function edulevel() {
        return $this->belongsTo('App\Edulevel');
    }
}
