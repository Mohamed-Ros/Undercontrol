<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Tool;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToolModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_tool_can_be_created()
    {
        $tool = Tool::factory()->create([
            'name' => 'Test Tool',
            'image' => 'test-image.png'
        ]);

        $this->assertInstanceOf(Tool::class, $tool);
        $this->assertEquals('Test Tool', $tool->name);
        $this->assertEquals('test-image.png', $tool->image);
    }

    public function test_tool_fillable_attributes()
    {
        $tool = Tool::factory()->create();

        $this->assertNotNull($tool->name);
        $this->assertNotNull($tool->image);
    }
}
