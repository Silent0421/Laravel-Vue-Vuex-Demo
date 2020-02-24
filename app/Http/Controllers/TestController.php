<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function get(Test $test) {
        return response()->json($test->all());
    }
}
