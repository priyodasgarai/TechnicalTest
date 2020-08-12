<?php

namespace App\Imports;

use App\model\post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new post([
            //
             'lot_no'     => $row[0],
            'price'    => $row[1], 
            'status'    => $row[2],
            'phase'    => $row[3]
        ]);
    }
    // headingRow function is use for specific row heading in your xls file

}
