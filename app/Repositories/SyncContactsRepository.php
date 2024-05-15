<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\ControlSynchronization;
use App\Utilities\SyncUtility;
use Illuminate\Support\Facades\Log;
use Throwable;

class SyncContactsRepository implements SyncContactsInterface
{
    public function getSyncContacts(): array
    {
        try {
            $sincronizar = ControlSynchronization::query()
                ->where('nombre','contacts')
                ->exists();
            if(!$sincronizar){
                $synchronizer = new SyncUtility('contacts',new ControlSynchronization());
                $synchronizer->getRequestContacts();
                $response = [
                    "status" => true,
                    "message" => 'Contactos sincronizados: '.$this->getDataSycn(),
                    "code" => 200,
                    "data" => null
                ];

            }else{
                $response = [
                    "status" => true,
                    "message" => 'Ya se han sincronizado los datos de los contactos,
                                  Contactos sincronizados: '.$this->getDataSycn(),
                    "code" => 200,
                    "data" => null
                ];
            }
            return $response;

        } catch (Throwable $exception) {
            Log::error($exception);
            return [
                "status" => false,
                "message" => 'Error sincronizado contactos',
                "code" => 500,
                "data" => null
            ];
        }

    }

    /**
     * @return int
     * Retornar la cantidad de contactos sincronizados
     */
    private function getDataSycn():int
    {
        return  ControlSynchronization::query()
            ->where('nombre','contacts')
            ->value('registros');
    }

}
