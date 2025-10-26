<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_setting_can_be_created()
    {
        $setting = Setting::factory()->create([
            'description' => 'Test Description',
            'facebook' => 'https://facebook.com/test',
            'linkedin' => 'https://linkedin.com/test',
            'tiktok' => 'https://tiktok.com/test',
            'logo' => 'test-logo.png',
            'copyright' => 'Test Copyright'
        ]);

        $this->assertInstanceOf(Setting::class, $setting);
        $this->assertEquals('Test Description', $setting->description);
        $this->assertEquals('https://facebook.com/test', $setting->facebook);
        $this->assertEquals('https://linkedin.com/test', $setting->linkedin);
        $this->assertEquals('https://tiktok.com/test', $setting->tiktok);
        $this->assertEquals('test-logo.png', $setting->logo);
        $this->assertEquals('Test Copyright', $setting->copyright);
    }

    public function test_setting_fillable_attributes()
    {
        $setting = Setting::factory()->create();

        $this->assertNotNull($setting->description);
        $this->assertNotNull($setting->facebook);
        $this->assertNotNull($setting->linkedin);
        $this->assertNotNull($setting->tiktok);
        $this->assertNotNull($setting->logo);
        $this->assertNotNull($setting->copyright);
    }
}
