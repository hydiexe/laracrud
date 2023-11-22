<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function edulevel() {
        return $this->belongsTo('App\Edulevel');
    }
}
