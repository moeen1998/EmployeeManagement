<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getstates(Country $country)
    {
        return $country->states;
    }
    public function getcity(State $state)
    {
        return $state->cities;
    }
}
