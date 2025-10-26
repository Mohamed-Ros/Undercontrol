<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_feature_can_be_created()
    {
        $feature = Feature::factory()->create([
            'title' => 'Test Feature',
            'description' => 'Test Description'
        ]);

        $this->assertInstanceOf(Feature::class, $feature);
        $this->assertEquals('Test Feature', $feature->title);
        $this->assertEquals('Test Description', $feature->description);
    }

    public function test_feature_fillable_attributes()
    {
        $feature = Feature::factory()->create();

        $this->assertNotNull($feature->title);
        $this->assertNotNull($feature->description);
    }
}
