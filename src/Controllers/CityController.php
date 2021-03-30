<?php

namespace Bendt\Courier\Controllers;

use Illuminate\Support\Facades\DB;
use Bendt\Courier\Providers\RajaOngkir\RajaOngkirService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController
{
    public function index(Request $request)
    {
        try {
            $province_id = $request->input('province_id');
            $city_id = $request->input('city_id');
            $service = new RajaOngkirService();
            return $service->getCities($province_id, $city_id);
        } catch (\Exception $e) {
            abt_custom('BC003',$e->getMessage());
            return back();
        }
    }
    public function show(Request $request)
    {
        try {
            $city_id = $request->input('city_id');
            $service = new RajaOngkirService();
            return $service->getCities(null, $city_id);
        } catch (\Exception $e) {
            abt_custom('BC004',$e->getMessage());
            return back();
        }
    }
}
