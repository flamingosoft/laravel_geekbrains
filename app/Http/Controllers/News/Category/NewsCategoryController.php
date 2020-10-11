<?php

namespace App\Http\Controllers\News\Category;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NewsCategoryController extends Controller
{
    public static function index() {
        return view('news.category.all')->with('categories', Categories::getAllCategories());
    }

    public static function getAllNewsByCategorySlug($categorySlug)
    {
        $categoryId = Categories::getCategoryByTitle($categorySlug);
        return view('news.category.bySlug',
            [
                'news' => News::getNewsByCategory($categoryId),
                'category' => Categories::getCategoryById($categoryId)
            ]);
    }
}
