<?php

namespace App\Exports;

use App\Models\Todo;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;

// class TodoExport implements FromCollection

class TodoExport implements FromView

{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Todo::all();
    // }

    public function view(): View
    {
        return view('Todo.export', [
            'todo' => Todo::all()
        ]);
    }



}
