<?php

namespace App\Datatables;

use App\Models\AccountingAccount;
use \Illuminate\Support\Facades\Request;

class AccountsDatatable
{
    public static function laratablesQueryConditions(AccountingAccount $model)
    {
        $baseQuery = $model->query();
        $filtroInicio = Request::route('start');
        $filtroFin = Request::route('end');
        if($filtroInicio && $filtroFin){
            return  $baseQuery->whereBetween('accountNumber', [$filtroInicio, $filtroFin]);
        }
        return $baseQuery;
    }
    public static function laratablesAdditionalColumns(): array
    {
        return ['id'];
    }

}
