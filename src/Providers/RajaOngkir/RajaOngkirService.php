<?php

namespace Bendt\Courier\Providers\RajaOngkir;

use Bendt\Courier\Provider;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class RajaOngkirService
{

    protected $BASE_URL = '';
    protected $API_KEY = '';
    protected $CACHE_KEY = '';
    protected $options = [];
    protected $couriers = [];
    protected $intCouriers = [];

    public function __construct()
    {
        $this->BASE_API = config('bendt-courier.providers.'.Provider::RAJA.'.base_api','https://pro.rajaongkir.com/api/');
        $this->API_KEY = config('bendt-courier.providers.'.Provider::RAJA.'.api_key');
        if($this->API_KEY === '') {
            throw new \Exception("Please set Raja Ongkir API Key in the config file generated by 'php artisan vendor:publish --tag=config'");
        }

        $this->options = [
            'headers' => [
                'key' => $this->API_KEY
            ],
            'base_uri' => $this->BASE_API
        ];

        $this->couriers = implode(':',config('bendt-courier.couriers',['jne']));
        $this->CACHE_KEY = Provider::RAJA.config('bendt-courier.cache.keys');
    }

    public function checkCache($prefix = '', $postfix = '') {

        $data = Cache::get($prefix.$this->CACHE_KEY.$postfix);
        if(is_null($data)) {
            return false;
        }
        return $data;
    }

    public function putCache($prefix = '', $postfix = '', $value) {
        $timeout = config('bendt-courier.cache.timeout',3600);
        Cache::put($prefix.$this->CACHE_KEY.$postfix, $value, $timeout);
    }

    public function getProvinces($id = null)
    {
        $cache = $this->checkCache('province',$id);
        if($cache) return $cache;

        $this->options['query'] = ['id' => $id];

        $client =  new Client();
        $res = $client->request('GET', 'province', $this->options);

        $data = $this->transformResponse($res);
        $this->putCache('province',$id, $data);

        return $data;
    }

    public function getCities($province_id = null, $city_id = null)
    {
        $postfix = $province_id.'-'.$city_id;
        $cache = $this->checkCache('city',$postfix);
        if($cache) return $cache;

        $this->options['query'] = [
            'id' => $city_id,
            'province' => $province_id,
        ];

        // Initiate HTTP Client and send request
        $client =  new Client();
        $res = $client->request('GET', 'city', $this->options);

        $data = $this->transformResponse($res);
        $this->putCache('city', $postfix, $data);

        return $data;
    }

    public function getDeliveryCosts($data)
    {
        try {
            //Set Active Courier
            $data['courier'] = $this->couriers;

            if(!isset($data['originType'])) $data['originType'] = 'city';
            if(!isset($data['origin'])) $data['origin'] = config('bendt-courier.providers.'.Provider::RAJA.'.default_sender_city_id',155);

            // Create request options
            $this->options['headers']['content-type'] = 'application/x-www-form-urlencoded';
            $this->options['form_params'] = $data;

            // Initiate HTTP Client and send request
            $client =  new Client();
            $res = $client->request('POST', 'cost', $this->options);

            return $this->transformResponse($res);
        } catch (\Exception $exception) {

        }
    }

    public function getInternationalDeliveryCosts($data)
    {
        try {
            //Set Active Courier
            $data['courier'] = $this->couriers;

            if(!isset($data['originType'])) $data['originType'] = 'city';
            if(!isset($data['origin'])) $data['origin'] = config('bendt-courier.providers.'.Provider::RAJA.'.default_sender_city_id',155);

            // Create request options
            $this->options['headers']['content-type'] = 'application/x-www-form-urlencoded';
            $this->options['form_params'] = $data;

            // Initiate HTTP Client and send request
            $client =  new Client();
            $res = $client->request('POST', 'cost', $this->options);

            return $this->transformResponse($res);
        } catch (\Exception $exception) {

        }
    }

    public function getDeliveryStatus($data)
    {
        try {

            //Set Active Courier
            $data['courier'] = $this->couriers;

            // Create request options
            $this->options['headers']['content-type'] = 'application/x-www-form-urlencoded';
            $this->options['form_params'] = $data;

            // Initiate HTTP Client and send request
            $client =  new Client();
            $res = $client->request('POST', 'waybill', $this->options);

            return $this->transformResponse($res);
        } catch (\Exception $exception) {

        }
    }

    public function findCostByCourierAndService($deliveryCosts, $courierCode, $serviceCode) {
        foreach ($deliveryCosts as $courier) {
            if($courier->code === $courierCode) {
                foreach ($courier->costs as $service) {
                    if($service->service === $serviceCode) {
                        return [
                            'courier' => $courier->name,
                            'courier_code' => $courier->code,
                            'service' => $service->service,
                            'service_description' => $service->description,
                            'etd' => $service->cost[0]->etd,
                            'value' => $service->cost[0]->value,
                        ];
                    }
                }
            }
        }

        return false;
    }

    protected function transformResponse($res)
    {
        // Retrieve Body From response and convert to Object
        $body = json_decode((string)$res->getBody());

        $status = $body->rajaongkir->status;
        if($status->code == 200) {
            if (isset($body->rajaongkir->results)) {
                return $body->rajaongkir->results;
            } else if (isset($body->rajaongkir->result)) {
                return $body->rajaongkir->result;
            }
        }
        else {
            throw new \Exception($status->description);
        }
    }
}
