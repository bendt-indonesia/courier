<?php

namespace Bendt\Courier\Controllers;

use Illuminate\Support\Facades\DB;
use Bendt\Courier\Providers\RajaOngkir\RajaOngkirService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

            $input = $request->all();
            if(!isset($input['destination_type'])) {
                $input['destinationType'] = 'city';
            } else {
                $input['destinationType'] = $input['destination_type'];
            }
            $input['destination'] = $input['destination_id'];

            $service = new RajaOngkirService();
            return $service->getDeliveryCosts($input);
        } catch (\Exception $e) {
            abt_custom('BC006',$e->getMessage());
            return back();
        }
    }
}
