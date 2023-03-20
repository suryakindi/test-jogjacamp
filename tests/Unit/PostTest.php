<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;


class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post(route('api-addcategory'), [
            'name' => 'Hello',
            'is_publish'=> '1',
          ])
          ->assertStatus(400);
    }
}
