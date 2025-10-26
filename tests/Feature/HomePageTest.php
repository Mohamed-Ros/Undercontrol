<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * Test that the home page loads successfully.
     */
    public function test_home_page_loads_successfully()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
