<?php

namespace App\Imports;

use App\Models\Todo;
use Maatwebsite\Excel\Concerns\ToModel;

class Todoimport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Todo([
            // 'id'=>$row[0],
            'task_name'=>$row[0] ?? 'None',
            'status'=>$row[1] ?? 'None'
// 

        ]);
    }
}
