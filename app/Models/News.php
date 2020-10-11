<?php

namespace App\Models;

class News
{
    static private $newsData = [
        0 => [
            'id' => 0,
            'title' => 'Новость по cpu',
            'message' => 'что вам сказать :)',
            'categoryId' => 0
            ],
        1 => [
            'id' => 1,
            'title' => 'Ну это совсеем другая новость про cpu',
            'message' => 'Совершенно другая',
            'categoryId' => 0
            ],
        2 => [
            'id' => 2,
            'title' => 'это про материнки',
            'message' => 'материнки они такие материнки!',
            'categoryId' => 1
            ]
    ];

    /**
     * Все новости в формате [$newsId][ {'id', 'title', 'message', 'categoryid'} ]
     * @return array
     */
    public static function getAllNews(): array
    {
        return static::$newsData;
    }

    /**
     * Новость по её id в формате [ {'id', 'title', ... } ]
     * @param int $id
     * @return array
     */
    public static function getNewsById(int $id): array {
        if (array_key_exists($id, static::$newsData))
            return static::$newsData[$id];
        else
            return [];
    }

    /**
     * массив новостей по номеру категории в формате [$newsId][ { 'id', 'title', ... } ]
     * @param int $categoryId
     * @return array
     */
    public static function getNewsByCategory(int $categoryId): array {
        $res = array_filter(static::$newsData,
            function($elem) use ($categoryId) {
                return array_key_exists('categoryId', $elem)
                    && $elem['categoryId'] == $categoryId;
            }
        );
        return $res;
    }
}
