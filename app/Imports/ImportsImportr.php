<?php

namespace App\Imports;

use App\model\import;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportsImportr implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new import([
            //
            'lot_no'     => $row[0],
            'price'    => $row[1], 
            'status'    => $row[2],
            'phase'    => $row[3]
        ]);
    }
}
