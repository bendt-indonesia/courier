<?php

namespace Bendt\Courier;


class Couriers
{
    //https://rajaongkir.com/dokumentasi#daftar-kurir

    const ANTERAJA = 'anteraja';
    const IDE = 'ide';
    const DSE = 'dse';
    const EXPEDITO = 'expedito';
    const FIRST = 'first';
    const JET = 'jet';
    const JNE = 'jne';
    const JNT = 'jnt';
    const IDL = 'idl';
    const LION = 'lion';
    const NCS = 'ncs';
    const NINJA = 'ninja';
    const PAHALA = 'pahala';
    const PANDU = 'pandu';
    const POS = 'pos';
    const REX = 'rex';
    const RPX = 'rpx';
    const SAP = 'sap';
    const SICEPAT = 'sicepat';
    const SENTRAL = 'sentral';
    const STAR = 'star';
    const TIKI = 'tiki';
    const WAHANA = 'wahana';

    public static $courierLabel = [
        self::ANTERAJA => 'ANTERAJA',
        self::DSE => '21 Express',
        self::EXPEDITO => 'Expedito',
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
        self::EXPEDITO => [
            'checkFee' => 1,
            'printReceipt' => 0,
            'internationalShipping' => 1,
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
