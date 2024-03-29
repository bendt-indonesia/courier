<?php
use Bendt\Courier\Couriers;
use Bendt\Courier\Provider;

return [

    /*
    |--------------------------------------------------------------------------
    | Bendt Courier Services Configuration
    |--------------------------------------------------------------------------
    |
    */

    'cache' => [
        'keys' => '4GtVbPEpctDK86QcA6TWx7z9SdcZnyY4',
        'timeout' => 3600, //seconds
    ],
    'couriers' => [
        Couriers::SICEPAT,
    ],
    'filters' => [
        Couriers::SICEPAT => ["BEST","REG"],
    ],
    'insurance_fee' => [
        Couriers::SICEPAT => [
            "BEST" => 0,
            "REG" => 0,
        ],
    ],
    'provider' => Provider::RAJA, // Listed on Bendt\Courier\Provider
    'providers' => [
        //https://rajaongkir.com/dokumentasi
        Provider::RAJA => [
            'api_key' => '',
            'base_api' => 'https://pro.rajaongkir.com/api/',
            'default_sender_city_id' => 155, // Jakarta Barat
        ]
    ],
    'routes_enabled' => true,
    'markup_percentage' => 0,
];
