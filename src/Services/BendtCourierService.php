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
     * Returned array from getFilteredDeliveryCosts functions
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

    // Required courier, service
    public static function findDeliveryCost($data)
    {
        $couriersAvailable = self::getFilteredDeliveryCosts($data);

        foreach ($couriersAvailable as $courier) {
            if(strtolower($courier->code) === strtolower($data['courier'])) {
                foreach ($courier->costs as $cost) {
                    if(strtolower($cost->service) === strtolower($data['service'])) {
                        return [
                            'courier_code' => $courier->code,
                            'courier_name' => $courier->name,
                            'courier_service' => $cost->service,
                            'courier_service_description' => $cost->description,
                            'courier_cost' => isset($cost->cost[0]->value) ? $cost->cost[0]->value : 0,
                            'courier_etd' =>  isset($cost->cost[0]->etd) ? $cost->cost[0]->etd : '-',
                            'courier_note' =>  isset($cost->cost[0]->note) ? $cost->cost[0]->note : '',
                        ];
                    }
                }
            }
        }

        return false;
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
        $filtered = self::filterServices($results);
        return self::addInsuranceFee($filtered);
    }

    //Filters returned data, with config exceptions
    //Memunculkan kurir service yang di filter oleh config bendt-courier.filters
    public static function filterServices($shippingFeesData) {
        $filters = config('bendt-courier.filters',[]);
        if(!$shippingFeesData || count($shippingFeesData) === 0) return [];

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

    //Filters returned data, with config exceptions
    //Memunculkan kurir service yang di filter oleh config bendt-courier.filters
    public static function addInsuranceFee($shippingFeesData) {
        $insurances = config('bendt-courier.insurance_fee',[]);
        if(count($insurances) === 0) return $shippingFeesData;

        foreach ($shippingFeesData as $cidx => $courier) {
            if(isset($insurances[$courier->code]) && count($insurances[$courier->code]) > 0) {
                foreach ($courier->costs as $idx => $service) {
                    $serviceCode = $service->service;
                    if(isset($insurances[$courier->code][$serviceCode])) {
                        foreach ($service->cost as $zidx => $c) {
                            $shippingFeesData[$cidx]->costs[$idx]->cost[$zidx]->value = $c->value + $insurances[$courier->code][$serviceCode];
                        }
                    }
                }
            }
        }

        return $shippingFeesData;
    }

}


