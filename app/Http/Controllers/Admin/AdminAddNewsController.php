<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAddNewsController extends Controller
{
    public function __invoke()
    {
        return view('admin.addNews')
            ->with('categories', Categories::getAllCategories());
    }
}
