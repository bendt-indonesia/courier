<?php
use Bendt\Courier\Couriers;

return [

    /*
    |--------------------------------------------------------------------------
    | Bendt Courier Services Configuration
    |--------------------------------------------------------------------------
    |
    */

    //https://rajaongkir.com/dokumentasi
    'couriers' => [
        Couriers::SICEPAT
    ],
    'providers' => [
        'raja_ongkir' => [
            'api_key' => '',
            'base_api' => 'https://pro.rajaongkir.com/api/',
            'default_sender_city_id' => 155, // Jakarta Barat
        ]
    ]
];
