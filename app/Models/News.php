<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class News
{
    static private $data = null;

    private static function initData(): void
    {
        try {
            if (static::repo()->exists(static::getContainerName())) {
                static::setData(json_decode(static::repo()->get(static::getContainerName()), true));
                return;
            }
        } catch (FileNotFoundException $e) {
        }
        static::setDefault();
        static::save();

    }

    /**
     * @return Filesystem
     */
    private static function repo()
    {
        return Storage::disk(static::getDriver());
    }

    public static function getDriver(): string
    {
        return 'local';
    }

    public static function setData(array $Data)
    {
        static::$data = $Data;
    }

    public static function save(): void
    {
        Storage::disk(static::getDriver())->put(static::getContainerName(), json_encode(static::getData()));
    }

    protected static function getData(): array
    {
        if (is_null(static::$data))
            static::initData();
        return static::$data;
    }

    private static function setDefault(): void {
        static::setData([
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
        ]);
    }

    public static function getContainerName(): string {
        return 'news';
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
        if (array_key_exists($id, static::getData()))
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
