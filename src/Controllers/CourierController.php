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
            $results = $service->getDeliveryCosts($input);
            return $this->filterServices($results);
        } catch (\Exception $e) {
            abt_custom('BC006',$e->getMessage());
            return back();
        }
    }

    public function filterServices($shippingFeesData) {
        $filters = config('bendt-courier.filters',[]);

        foreach ($shippingFeesData as $courier) {
            if(isset($filters[$courier->code]) && count($filters[$courier->code]) > 0) {
                foreach ($courier->costs as $idx=>$cost) {
                    if(!in_array($cost->service, $filters[$courier->code])) {
                        unset($courier->cost[$idx]);
                    }
                }
            }
        }

        return $shippingFeesData;
    }
}
