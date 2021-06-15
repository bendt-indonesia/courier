<?php
namespace Bendt\Courier\Services;

use Bendt\Courier\Providers\RajaOngkir\RajaOngkirService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BendtCourierService
{
    public static function getFilteredDeliveryCost($data)
    {
        if(!isset($data['destination_type'])) {
            $data['destinationType'] = 'city';
        } else {
            $data['destinationType'] = $data['destination_type'];
        }
        $data['destination'] = $data['destination_id'];

        $service = new RajaOngkirService();
        $results = $service->getDeliveryCosts($data);
        return self::filterServices($results);
    }

    public static function filterServices($shippingFeesData) {
        $filters = config('bendt-courier.filters',[]);

        foreach ($shippingFeesData as $courier) {
            if(isset($filters[$courier->code]) && count($filters[$courier->code]) > 0) {
                foreach ($courier->costs as $idx=>$cost) {
                    if(!in_array($cost->service, $filters[$courier->code])) {
                        unset($courier->costs[$idx]);
                    }
                }
            }
        }

        return $shippingFeesData;
    }
}
