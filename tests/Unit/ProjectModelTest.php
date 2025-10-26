<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_can_be_created()
    {
        $project = Project::factory()->create([
            'name' => 'Test Project',
            'video' => 'test-video.mp4',
            'description' => 'Test Description'
        ]);

        $this->assertInstanceOf(Project::class, $project);
        $this->assertEquals('Test Project', $project->name);
        $this->assertEquals('test-video.mp4', $project->video);
        $this->assertEquals('Test Description', $project->description);
    }

    public function test_project_fillable_attributes()
    {
        $project = Project::factory()->create();

        $this->assertNotNull($project->name);
        $this->assertNotNull($project->video);
        $this->assertNotNull($project->description);
    }
}
