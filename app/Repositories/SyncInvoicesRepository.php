<?php

namespace App\Repositories;

use App\Models\ControlSynchronization;
use App\Utilities\SyncUtility;
use Illuminate\Support\Facades\Log;
use Throwable;
class SyncInvoicesRepository implements SyncInvoicesInterface
{
    const DOCUMENTS_INVOICE = 'documents/invoice';

    public function getSyncInvoices(): array
    {
        try {
            $sincronizar = ControlSynchronization::query()
                ->where('nombre', self::DOCUMENTS_INVOICE)
                ->exists();
            if(!$sincronizar){
                $synchronizer = new SyncUtility(self::DOCUMENTS_INVOICE,new ControlSynchronization());
                $synchronizer->getRequestInvoices();
                $response = [
                    "status" => true,
                    "message" => 'Facturas sincronizadas: '.$this->getDataSycn(),
                    "code" => 200,
                    "data" => null
                ];

            }else{
                $response = [
                    "status" => true,
                    "message" => 'Ya se han sincronizado los datos de las facturas,
                                  Facturas sincronizadas: '.$this->getDataSycn(),
                    "code" => 200,
                    "data" => null
                ];
            }
            return $response;

        } catch (Throwable $exception) {
            Log::error($exception);
            return [
                "status" => false,
                "message" => 'Error sincronizado Facturas',
                "code" => 500,
                "data" => null
            ];
        }

    }

    /**
     * @return int
     * Retornar la cantidad de facturas sincronizadas
     */
    private function getDataSycn():int
    {
        return  ControlSynchronization::query()
            ->where('nombre', self::DOCUMENTS_INVOICE)
            ->value('registros');
    }

}
