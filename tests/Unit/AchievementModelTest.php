<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Achievement;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AchievementModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_achievement_can_be_created()
    {
        $achievement = Achievement::factory()->create([
            'title' => 'Test Achievement',
            'description' => 'Test Description',
            'image_path' => 'test-image.jpg'
        ]);

        $this->assertInstanceOf(Achievement::class, $achievement);
        $this->assertEquals('Test Achievement', $achievement->title);
        $this->assertEquals('Test Description', $achievement->description);
        $this->assertEquals('test-image.jpg', $achievement->image_path);
    }

    public function test_achievement_fillable_attributes()
    {
        $achievement = Achievement::factory()->create();

        $this->assertNotNull($achievement->title);
        $this->assertNotNull($achievement->description);
        $this->assertNotNull($achievement->image_path);
    }
}
