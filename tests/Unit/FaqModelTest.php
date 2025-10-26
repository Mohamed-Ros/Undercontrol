<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FaqModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_faq_can_be_created()
    {
        $faq = Faq::factory()->create([
            'question' => 'Test Question?',
            'answer' => 'Test Answer'
        ]);

        $this->assertInstanceOf(Faq::class, $faq);
        $this->assertEquals('Test Question?', $faq->question);
        $this->assertEquals('Test Answer', $faq->answer);
    }

    public function test_faq_fillable_attributes()
    {
        $faq = Faq::factory()->create();

        $this->assertNotNull($faq->question);
        $this->assertNotNull($faq->answer);
    }
}
