<?php

namespace App\Http\Controllers\News\Category;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NewsCategoryController extends Controller
{
    public static function index() {
        return view('news.category.all')->with('categories', Categories::factory()->getAllCategories());
    }

    public static function getAllNewsByCategorySlug($categorySlug)
    {
        $categoryId = Categories::factory()->getCategoryByTitle($categorySlug);
        return view('news.category.bySlug',
            [
                'news' => News::factory()->getNewsByCategory($categoryId),
                'category' => Categories::factory()->getCategoryById($categoryId)
            ]);
    }
}
