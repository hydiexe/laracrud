<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdulevelController extends Controller
{
    public function data() {
        $edulevels = DB::table('edulevels')->get();

        // return $edulevels;
        return view('edulevel.data', ['edulevels' => $edulevels]);

    }
}
