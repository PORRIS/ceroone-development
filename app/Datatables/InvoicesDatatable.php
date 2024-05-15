<?php

namespace App\Datatables;

use App\Models\Invoice;
use \Illuminate\Support\Facades\Request;

class InvoicesDatatable
{
    public static function laratablesQueryConditions(Invoice $model)
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
        return ['id'];
    }

}
