<?php

namespace Bendt\Courier\Controllers;

use Illuminate\Support\Facades\DB;
use Bendt\Courier\Providers\RajaOngkir\RajaOngkirService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProvinceController
{
    public function index(Request $request)
    {
        try {
            $service = new RajaOngkirService();

            return $service->getProvinces();
        } catch (\Exception $e) {
            abt_custom('BC001',$e->getMessage());
        }
    }
    public function show(Request $request,$id)
    {
        try {
            $service = new RajaOngkirService();

            return $service->getProvinces($id);
        } catch (\Exception $e) {
            abt_custom('BC002',$e->getMessage());
        }
    }
}
