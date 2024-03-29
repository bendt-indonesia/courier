<?php

namespace Bendt\Courier;


class Couriers
{
    //https://rajaongkir.com/dokumentasi#daftar-kurir

    const ANTERAJA = 'anteraja';
    const IDE = 'ide';
    const JNE = 'jne';
    const JNT = 'jnt';
    const LION = 'lion';
    const NCS = 'ncs';
    const POS = 'pos';
    const REX = 'rex';
    const RPX = 'rpx';
    const SAP = 'sap';
    const SICEPAT = 'sicepat';
    const SENTRAL = 'sentral';
    const TIKI = 'tiki';
    const WAHANA = 'wahana';

    //Last Check 30 Jan 2022 - Returned empty result
    const DSE = 'dse'; //empty
    const JET = 'jet'; //empty
    const FIRST = 'first'; //empty
    const IDL = 'idl'; //empty
    const NINJA = 'ninja'; //empty
    const PAHALA = 'pahala'; //empty
    const PANDU = 'pandu'; //empty
    const STAR = 'star'; //empty

    public static $courierLabel = [
        self::ANTERAJA => 'ANTERAJA',
        self::DSE => '21 Express',
        self::FIRST => 'First Logistics',
        self::IDE => 'ID Express',
        self::IDL => 'IDL Cargo',
        self::JET => 'JET Express',
        self::JNE => 'Jalur Nugraha Ekakurir',
        self::JNT => 'J&T Express',
        self::LION => 'Lion Parcel',
        self::NCS => 'Nusantara Card Semesta',
        self::NINJA => 'Ninja Xpress',
        self::PAHALA => 'Pahala Kencana Express',
        self::PANDU => 'Pandu Logistics',
        self::POS => 'POS Indonesia',
        self::REX => 'Royal Express Indonesia',
        self::RPX => 'RPX Holding ',
        self::SAP => 'SAP Express',
        self::SICEPAT => 'Si Cepat',
        self::SENTRAL => 'Sentral Cargo',
        self::STAR => 'Star Cargo',
        self::TIKI => 'Citra Van Titipan Kilat',
        self::WAHANA => 'Wahana Prestasi Logistik ',
    ];

    public static $courierSettings = [
        self::ANTERAJA => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::DSE => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::FIRST => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::IDE => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::IDL => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::JET => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::JNE => [
            'checkFee' => 1,
            'printReceipt' => 0,
            'internationalShipping' => 0,
        ],
        self::JNT => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::LION => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::NCS => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::NINJA => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::PAHALA => [
            'checkFee' => 1,
            'printReceipt' => 0,
            'internationalShipping' => 0,
        ],
        self::PANDU => [
            'checkFee' => 1,
            'printReceipt' => 0,
            'internationalShipping' => 0,
        ],
        self::POS => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 1,
        ],
        self::REX => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::RPX => [
            'checkFee' => 1,
            'printReceipt' => 0,
            'internationalShipping' => 0,
        ],
        self::SAP => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::SICEPAT => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::SENTRAL => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
        self::STAR => [
            'checkFee' => 1,
            'printReceipt' => 0,
            'internationalShipping' => 0,
        ],
        self::TIKI => [
            'checkFee' => 1,
            'printReceipt' => 0,
            'internationalShipping' => 0,
        ],
        self::WAHANA => [
            'checkFee' => 1,
            'printReceipt' => 1,
            'internationalShipping' => 0,
        ],
    ];

}
