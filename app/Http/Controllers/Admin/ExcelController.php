<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function getAllRequestsToExcel()
    {

        $requests = \App\Request::select('id','first_name','last_name','description','created_at')->get();

        Excel::create('requests', function($excel) use($requests) {
            $excel->sheet('Sheet 1', function($sheet) use($requests) {
                $sheet->fromArray($requests);
            });
        })->export('xls');
    }
}
