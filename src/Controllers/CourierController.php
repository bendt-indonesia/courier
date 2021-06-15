<?php

namespace Bendt\Courier\Controllers;

use Illuminate\Support\Facades\DB;
use Bendt\Courier\Providers\RajaOngkir\RajaOngkirService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Bendt\Courier\Services\BendtCourierService;

class CourierController
{
    public function estimate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'destination_id' => 'required|numeric|min:1', //city_id or country_id
                'destination_type' => 'nullable|in:city,subdistrict',
                'weight' => 'required|numeric|min:0'
            ]);
            if ($validator->fails()) {
                abt_custom('BC005','Validation failed');
            }

            $data = $request->all();

            return BendtCourierService::getFilteredDeliveryCost($data);
        } catch (\Exception $e) {
            abt_custom('BC006',$e->getMessage());
            return back();
        }
    }
}
