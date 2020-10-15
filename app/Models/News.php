<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class News
{
    static private $newsData = null;

    private static $storage = [
        'container' => "repo/news",
        'driver' => 'local',
    ];

    /**
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    private static function repo() {
        return Storage::disk(static::$storage['driver']);
    }

    private static function getData(): array {
        if (is_null(static::$newsData))
            static::initData();
        return static::$newsData;
    }

    private static function save(): void {
        Storage::disk(static::$storage['driver'])->put(static::$storage['container'], json_encode(static::getData()));
    }

    private static function setDeafult(): void {
        static::$newsData = [
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
    }

    private static function initData(): void
    {
        try {
            if (self::repo()->exists(static::$storage['container'])) {
                static::$newsData = json_decode(self::repo()->get(static::$storage['container']));
                return;
            }
        }catch (FileNotFoundException $e) {
        }
        static::setDeafult();
        static::save();

    }


    /**
     * Все новости в формате [$newsId][ {'id', 'title', 'message', 'categoryid'} ]
     * @return array
     */
    public static function getAllNews(): array
    {
        return static::getData();
    }

    /**
     * Новость по её id в формате [ {'id', 'title', ... } ]
     * @param int $id
     * @return array
     */
    public static function getNewsById(int $id): array
    {
        if (array_key_exists($id, static::$newsData))
            return static::getData()[$id];
        else
            return [];
    }

    /**
     * массив новостей по номеру категории в формате [$newsId][ { 'id', 'title', ... } ]
     * @param int $categoryId
     * @return array
     */
    public static function getNewsByCategory(int $categoryId): array
    {
        $res = array_filter(static::getData(),
            function ($elem) use ($categoryId) {
                return array_key_exists('categoryId', $elem)
                    && $elem['categoryId'] == $categoryId;
            }
        );
        return $res;
    }
}
