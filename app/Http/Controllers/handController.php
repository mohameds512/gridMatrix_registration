<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\country;
use App\Models\city;
use App\Models\language;
use App\Models\certificate;

class handController extends Controller
{
    public function getCountries()
    {
        $countries = country::get(['name','id']);

        return \response()->json($countries);
    }

    public function getCities($country_id )
    {
        $cities = city::where('country_id',$country_id)->get(['name','id']);
        return $cities;
        return \response()->json($cities);

    }

    public function getLanguages( )
    {
        $languages = language::get(['name','id']);
        return \response()->json($languages);
    }
    public function getCerts( )
    {
        $certs = certificate::get(['name','id']);
        return \response()->json($certs);
    }
}
