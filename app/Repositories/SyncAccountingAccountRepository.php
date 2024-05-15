<?php

namespace App\Repositories;

use App\Models\ControlSynchronization;
use App\Utilities\SyncUtility;
use Illuminate\Support\Facades\Log;
use Throwable;
class SyncAccountingAccountRepository implements SyncAccountingAccountInterface
{
    const TREASURY = 'treasury';

    public function getSyncAccounts(): array
    {
        try {
            $sincronizar = ControlSynchronization::query()
                ->where('nombre', self::TREASURY)
                ->exists();
            if(!$sincronizar){
                $synchronizer = new SyncUtility(self::TREASURY,new ControlSynchronization());
                $synchronizer->getRequestAccounts();
                $response = [
                    "status" => true,
                    "message" => 'Cuentas sincronizadas: '.$this->getDataSycn(),
                    "code" => 200,
                    "data" => null
                ];

            }else{
                $response = [
                    "status" => true,
                    "message" => 'Ya se han sincronizado los datos de las Cuentas,
                                  Cuentas sincronizadas: '.$this->getDataSycn(),
                    "code" => 200,
                    "data" => null
                ];
            }
            return $response;

        } catch (Throwable $exception) {
            Log::error($exception);
            return [
                "status" => false,
                "message" => 'Error sincronizado Cuentas',
                "code" => 500,
                "data" => null
            ];
        }

    }

    /**
     * @return int
     * Retornar la cantidad de Cuentas sincronizadas
     */
    private function getDataSycn():int
    {
        return  ControlSynchronization::query()
            ->where('nombre', self::TREASURY)
            ->value('registros');
    }
}
