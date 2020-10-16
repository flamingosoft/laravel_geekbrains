<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NewsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminGetNewsController extends Controller
{
    public function __invoke(Request $request)
    {
//        return response()->download($this->PrepareDownload());
        return Excel::download(new NewsExport, 'news.xlsx');
    }

//    protected function PrepareDownload()
//    {
//        $filename = storage_path() . '/app/test.xls';
//        Excel::store((object)News::factory()->getAllNews(), $filename);
//        return $filename;
//    }
}
