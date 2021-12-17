<?php
namespace Bendt\Courier\Services;

use Bendt\Courier\Providers\RajaOngkir\RajaOngkirService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BendtCourierService
{
    //Required: destination_id,
    /*
    $courierOptionsExample = [
        [
            'code' => 'jne',
            'name' => 'Jalur Nugraha Ekakurir (JNE)',
            'costs' => [
                [
                    'service' => 'OKE',
                    'description' => 'Ongkos kirim ekonomis',
                    'cost' => [
                        [
                            'value' => 12000,
                            'etd' => '3-5',
                            'note' => '',
                        ]
                    ]
                ]
            ]
        ], []
    ];

    */
    public static function findDeliveryCost($data, $courierOptions = [])
    {
        $data['destination'] = $data['destination_id'];
        $service = new RajaOngkirService();
        $results = $service->getDeliveryCosts($data);
        return self::filterServices($results);
    }

    //Backward Compatibility, renamed function name with s letter
    public static function getFilteredDeliveryCost($data)
    {
        return self::getFilteredDeliveryCosts($data);
    }

    //Required: destination_id, weight
    //Optional: destinationType, origin, originType
    public static function getFilteredDeliveryCosts($data)
    {
        $data['destination'] = $data['destination_id'];
        $service = new RajaOngkirService();
        $results = $service->getDeliveryCosts($data);
        return self::filterServices($results);
    }

    //Filters returned data, with config exceptions
    //Memunculkan kurir service yang di filter oleh config bendt-courier.filters
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
