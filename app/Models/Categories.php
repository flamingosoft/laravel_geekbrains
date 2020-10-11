<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories
{
    private static $categoriesData = [
      0 => [
          'title' => 'процессоры',
          'slug' => 'cpu'
          ],
      1 => [
          'title' => 'материнские платы',
          'slug' => 'motherboards'
          ],
      2 => [
          'title' => 'жетские диски',
          'slug' => 'hdd'
          ]
    ];

    /**
     * все категории в формате [ $categoryId ][ { 'title', 'slug' } ]
     * @return array
     */
    public static function getAllCategories(): array {
        return static::$categoriesData;
    }

    /**
     * данные о категории в виде [ { 'title', 'slug' } ]
     * @param int $id
     * @return array
     */
    public static function getCategoryById(int $id): array {
        if (array_key_exists($id, static::$categoriesData))
            return static::$categoriesData[$id];
        else
            return [];
    }

    /**
     * Ищем Id категории по её slug описанию
     * @param string $slug
     * @return int | FALSE
     */
    public static function getCategoryByTitle(string $slug): int {
        return array_search($slug, array_column(static::$categoriesData, 'slug'));
    }
}
