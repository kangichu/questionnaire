<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Register;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompleteExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('registers')->join('shops', 'registers.user_id', '=', 'shops.user_id')->select('registers.*', 'shops.sname', 'shops.location')->get();
    }

    public function headings(): array

    {

        return [

            'id',

            'Name',

            'Email Address',

            'Phone Number',

            'Code',

            'Product',

            'Serial Number',

            'TOS',

            'Created At',

            'Updated At',

            'Receipt Number',

            'Amount',

            'Points',

            'Shop ID',
            
            'Shop',

            'Location',

        ];

    }
}
