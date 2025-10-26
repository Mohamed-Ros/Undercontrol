<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a course can be created.
     */
    public function test_course_can_be_created()
    {
        $course = Course::factory()->create();

        $this->assertDatabaseHas('courses', [
            'id' => $course->id,
            'name' => $course->name,
        ]);
    }

    /**
     * Test that course prices are cast correctly.
     */
    public function test_course_prices_are_cast_correctly()
    {
        $course = Course::factory()->create([
            'price_usd' => 100.50,
            'price_egp' => 3000.75,
            'price_omr' => 38.25,
        ]);

        $this->assertIsString($course->price_usd); // Laravel casts to string for decimal
        $this->assertEquals('100.50', $course->price_usd);
        $this->assertIsString($course->price_egp);
        $this->assertEquals('3000.75', $course->price_egp);
        $this->assertIsString($course->price_omr);
        $this->assertEquals('38.25', $course->price_omr);
    }
}
