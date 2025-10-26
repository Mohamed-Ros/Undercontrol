<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CoursePageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the course page loads successfully.
     */
    public function test_course_page_loads_successfully()
    {
        // Create a course
        $course = Course::factory()->create();

        // Make a GET request to the course page
        $response = $this->get('/course/' . $course->id);

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the course name is displayed
        $response->assertSee($course->name);
    }

    /**
     * Test that a 404 is returned for a non-existent course.
     */
    public function test_non_existent_course_returns_404()
    {
        // Make a GET request to a non-existent course
        $response = $this->get('/course/999');

        // Assert that the response is 404
        $response->assertStatus(404);
    }

    /**
     * Test that the course page displays the correct price based on location.
     */
    public function test_course_page_displays_correct_price_based_on_location()
    {
        // Create a course with prices
        $course = Course::factory()->create([
            'price_usd' => 100.00,
            'price_egp' => 3000.00,
            'price_omr' => 38.50,
        ]);

        // Test for default (United States)
        $response = $this->get('/course/' . $course->id);
        $response->assertStatus(200);
        $response->assertSee('100');
        $response->assertSee('$');

        // Note: For testing different countries, you might need to mock the Location facade
        // or set up specific IP addresses in your test environment.
    }
}
