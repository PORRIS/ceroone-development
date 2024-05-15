<?php

namespace App\Datatables;

use App\Models\Contact;

class ContactsDatatable
{

    public static function laratablesAdditionalColumns(): array
    {
        return ['name', 'email'];
    }

}
