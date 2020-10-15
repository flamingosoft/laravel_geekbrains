<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;


class News extends Model
{
    private static $instance = null;

    public static function factory(): News {
        if (is_null(static::$instance)) {
            static::$instance = new News();
        }
        return static::$instance;
    }

    protected  function getContainerName(): string {
        return 'news';
    }

    public function addNews($title, $category, $message, $private): int
    {
        $data = $this::getData();
        $id = array_push($data,
            ['id' => 1 + max(array_keys($data)),
                'title' => $title,
                'categoryId' => Categories::factory()->getCategoryByTitle($category),
                'message' => $message,
                'private' => $private == "private"
            ]
        );
        News::setData($data);
        return --$id;
    }

    protected function setDefault(): void {
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

    /**
     * Все новости в формате [$newsId][ {'id', 'title', 'message', 'categoryid'} ]
     * @return array
     */
    public function getAllNews(): array
    {
        return $this->getData();
    }

    /**
     * Новость по её id в формате [ {'id', 'title', ... } ]
     * @param int $id
     * @return array
     */
    public function getNewsById(int $id): array
    {
        if (array_key_exists($id, $this->getData()))
            return $this->getData()[$id];
        else
            return [];
    }

    /**
     * массив новостей по номеру категории в формате [$newsId][ { 'id', 'title', ... } ]
     * @param int $categoryId
     * @return array
     */
    public function getNewsByCategory(int $categoryId): array
    {
        $res = array_filter($this->getData(),
            function ($elem) use ($categoryId) {
                return array_key_exists('categoryId', $elem)
                    && $elem['categoryId'] == $categoryId;
            }
        );
        return $res;
    }
}
