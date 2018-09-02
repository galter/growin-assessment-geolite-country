<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Country;
use DB;
use App\Http\Resources\Country as CountryResource;

class CountryController extends Controller {
    public function index(Request $request) {
        

        /* return $request->IP; */
        $country = Country::select("*")->whereRaw('(INET_ATON(?)) between start_long and end_long', [$request->IP])->get()->first();

        /* return new CountryResource($country); */

        return (new CountryResource($country))
            ->response()
            ->setStatusCode(200);
    }
}
