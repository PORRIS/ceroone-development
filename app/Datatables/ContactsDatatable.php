<?php

namespace App\Datatables;

use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\Request;

class ContactsDatatable
{
    public static function laratablesQueryConditions(Contact $model)
    {
        $baseQuery = $model->query();
        $filtroInicio = Request::route('start');
        $filtroFin = Request::route('end');
        if($filtroInicio && $filtroFin){
            return  $baseQuery->whereBetween('id', [$filtroInicio, $filtroFin]);
        }
        return $baseQuery;
    }
    public static function laratablesAdditionalColumns(): array
    {
        return ['id','name', 'email'];
    }

}
