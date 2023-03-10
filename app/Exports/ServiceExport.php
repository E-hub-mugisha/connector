<?php

namespace App\Exports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServiceExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'id',
            'name',
            'service_category_id',
            'service_provider_id',
            'price',
            'discount',
            'discount_type',
            'location',
            'created_at'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Service::all();
        return Service::getService();
    }
}
