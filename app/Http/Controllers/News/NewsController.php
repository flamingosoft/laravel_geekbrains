<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Controllers\News\Category\NewsCategoryController;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Список всех новостей и категорий
     * @return Factory|View('news.all')
     */
    public function index()
    {
        $categories = Categories::factory()->getAllCategories();
        $news = News::factory()->getAllNews();
        return view('news.all')
            ->with('news', $news)
            ->with('categories', $categories);
    }

    /**
     * Список всех новостей по конкретной категории
     * @param $categorySlug
     * @return Factory|View
     */
    public function category($categorySlug)
    {
        return NewsCategoryController::getAllNewsByCategorySlug($categorySlug);
    }

    /**
     * конкретная новость по айдишнику
     * @param $newsId
     * @return Factory|View('news.id')
     */
    public function news($newsId)
    {
        //      dump($newsId);
        return view('news.id')
            ->with("new", News::factory()->getNewsById($newsId));
    }
}
