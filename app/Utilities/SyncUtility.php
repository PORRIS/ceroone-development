<?php

namespace App\Utilities;

use App\Models\Contact;
use App\Models\ControlSynchronization;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Exception;
class SyncUtility
{
    private string $apiKey;
    private string $url;
    private ControlSynchronization $control;
    private array $config;
    public function __construct(string $routeName,ControlSynchronization $control)
    {
        $this->url = config('synchronizer.api_url').$routeName;
        $this->apiKey = config('synchronizer.api_key');
        $this->config = config('synchronizer.config');
        $this->control = $control;
        $this->control->prefijo_url =  $this->url;
        $this->control->nombre =  $routeName;
        $this->control->estado =  1;

    }
    public function getRequestContacts(): bool
    {
        $this->logInfo('Iniciando Peticiones');
        $response = $this->processRequest($this->config);
        foreach($response as $pageData) {
            $insertData = [];
            foreach ($pageData as $data){
                $insertData[] =  [
                    'billAddress'=> json_encode($data['billAddress']),
                    'clientRecord'=> json_encode($data['clientRecord']),
                    'uuid'=> $data['id'],
                    'customId'=> $data['customId'],
                    'name'=> $data['name'],
                    'code'=> $data['code'],
                    'vatnumber'=> $data['vatnumber'],
                    'tradeName'=> $data['tradeName'],
                    'email'=> $data['email'],
                    'mobile'=> $data['mobile'],
                    'phone'=> $data['phone'],
                    'type'=> $data['type'],
                    'iban'=> $data['iban'],
                    'swift'=> $data['swift'],
                    'groupId'=> $data['groupId'],
                    'supplierRecord'=> json_encode($data['supplierRecord']),
                    'customFields'=> json_encode($data['customFields']),
                    'defaults'=> json_encode($data['defaults']),
                    'socialNetworks'=> json_encode($data['socialNetworks']),
                    'tags'=> json_encode($data['tags']),
                    'notes'=> json_encode($data['notes']),
                    'contactPersons'=> json_encode($data['contactPersons']),
                    'shippingAddresses'=> json_encode($data['shippingAddresses']),
                    'isperson'=> $data['isperson'],
                    'createdAt'=> $data['createdAt'],
                    'updatedAt'=> $data['updatedAt'],
                    'updatedHash'=> $data['updatedHash'],
                    'sync'=> 1,
                    'created_at'=> now(),
                    'updated_at'=> now()
                ];

            }
            DB::table('cro_contacts')->insert($insertData);
        }
        //conteo de cuantos registros se sincronizaron desde la api sync=1, syn=0 es registro creado por sistema
        $this->control->registros = DB::table('cro_contacts')
            ->where('sync',1)->count();
        $this->control->save();
        return true;
    }
    public function getRequestInvoices(): bool
    {
        $response = $this->processRequest($this->config);
        foreach($response as $pageData) {
            $insertData = [];
            foreach ($pageData as $data){
                $insertData[] =  [
                    'multipledueDate'=> json_encode($data['multipledueDate']),
                    'tags'=> json_encode($data['tags']),
                    'products'=> json_encode($data['products']),
                    'uuid'=> $data['id'],
                    'contact'=> $data['contact'],
                    'contactName'=> $data['contactName'],
                    'desc'=> $data['desc'],
                    'date'=> $data['date'],
                    'dueDate'=> $data['dueDate'],
                    'forecastDate'=> $data['forecastDate'],
                    'notes'=> $data['notes'],
                    'tax'=> $data['tax'],
                    'subtotal'=> $data['subtotal'],
                    'discount'=> $data['discount'],
                    'total'=> $data['total'],
                    'language'=> $data['language'],
                    'status'=> $data['status'],
                    'customFields'=> json_encode($data['customFields']),
                    'docNumber'=> $data['docNumber'],
                    'currency'=> $data['currency'],
                    'currencyChange'=> $data['currencyChange'],
                    'paymentMethodId'=> $data['paymentMethodId'],
                    'paymentsTotal'=> $data['paymentsTotal'],
                    'paymentsPending'=> $data['paymentsPending'],
                    'paymentsRefunds'=> $data['paymentsRefunds'],
                    'shipping'=> $data['shipping']??'',
                    'from'=>  isset($data['from'])?json_encode($data['from']):null,
                    'sync'=> 1,
                    'created_at'=> now(),
                    'updated_at'=> now()
                ];
            }
            DB::table('cro_invoices')->insert($insertData);
        }
        //conteo de cuantos registros se sincronizaron desde la api sync=1, syn=0 es registro creado por sistema
        $this->control->registros = DB::table('cro_invoices')
            ->where('sync',1)->count();
        $this->control->save();
        return true;
    }

    public function getRequestAccounts(): bool
    {
        $response = $this->processAccountsRequest($this->config);
        $insertData=[];
        foreach($response as $data) {
                $insertData[] =  [
                    'uuid'=> $data['id'],
                    'name'=> $data['name'],
                    'type'=> $data['type'],
                    'balance'=> $data['balance'],
                    'accountNumber'=> $data['accountNumber'],
                    'iban'=> isset($data['iban'])?$data['iban']:null,
                    'swift'=>isset($data['swift'])?$data['swift']:null,
                    'sync'=> 1,
                    'created_at'=> now(),
                    'updated_at'=> now()
                ];
        }
        DB::table('cro_accounts')->insert($insertData);
        //conteo de cuantos registros se sincronizaron desde la api sync=1, syn=0 es registro creado por sistema
        $this->control->registros = DB::table('cro_accounts')
            ->where('sync',1)->count();
        $this->control->save();
        return true;
    }
    private function processRequest(array $config)
    {
        try {
            $page = 1;
            while (true) {
                $response = Http::timeout($config['timeout'])
                    ->retry($config['retries'], 1000 * $config['retries_delay_seconds'])
                    ->withHeaders([
                        $config['api_key_header'] => $this->apiKey,
                        $config['api_accept_header'] => 'application/json',
                    ])
                    ->get($this->url . '?page='.$page);
                $data = $response->json();
                if (!empty($data)) {
                    yield $data;
                    $page++;
                } else {
                    break;
                }
            }
            $this->control->paginas = $page;

        } catch (Exception $exception) {
            $this->logInfo('Error en processRequest');
            $this->logInfo('Excepcion:',[$exception]);
            exit;
        }
    }

    private function processAccountsRequest(array $config)
    {
        try {
            $page = 1;
            $response = Http::timeout($config['timeout'])
                ->retry($config['retries'], 1000 * $config['retries_delay_seconds'])
                ->withHeaders([
                    $config['api_key_header'] => $this->apiKey,
                    $config['api_accept_header'] => 'application/json',
                ])
                ->get($this->url . '?page='.$page);
             $this->control->paginas = $page;
             return   $response->json();

        } catch (Exception $exception) {
            $this->logInfo('Error en processAccountsRequest');
            $this->logInfo('Excepcion:',[$exception]);
            exit;
        }
    }


    /**
     * @param string $message
     * @return void
     * Log de ayuda para ver progreso de las solicitudes
     */
    public function logInfo(string $message,$data = null )
    {
        Log::info($message);
        Log::info($data);
    }

}
