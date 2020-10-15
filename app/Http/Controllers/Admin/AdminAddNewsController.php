<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class AdminAddNewsController extends Controller
{
    public function __invoke(Request $request, Response $response)
    {
        if ($request->method() == "POST") {
            // получаем данные из формы
            $title = $request->title;
            $category = $request->category;
            $notes = $request->notes;
            $private = $request->private === "private";

            dd($request->except(['_token']));
            return redirect($request->url());
        }
        return view('admin.addNews')
            ->with('categories', Categories::getAllCategories());
    }
}
