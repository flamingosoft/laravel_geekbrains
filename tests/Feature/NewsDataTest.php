<?php

namespace Tests\Feature;

use App\Models\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsDataTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNews()
    {
        $this->assertTrue(is_array(News::factory()->getAllNews()));
    }

    public function testStructure()
    {
        $this->assertTrue($this->is_correct_structure(News::factory()->getAllNews()));
    }

    public function testRoutes() {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
    }

    protected function is_correct_structure($object) {
        return is_array($object) &&
            !is_null($object[0]);
    }
}
