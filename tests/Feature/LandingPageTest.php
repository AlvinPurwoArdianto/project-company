<?php

namespace Tests\Feature;

use App\Models\Testimoni;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    public function test_landing_page_renders_successfully()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Victory English School');
        $response->assertSee('Percaya Diri');
    }

    public function test_user_can_submit_testimoni_and_it_is_connected_to_frontend()
    {
        $payload = [
            'nama'      => 'Ahmad Test',
            'testimoni' => 'Kursus ini sangat membantu saya berbicara bahasa Inggris dengan percaya diri.',
            'rating'    => 5,
        ];

        $response = $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)->post('/', $payload);

        $response->assertRedirect(route('front.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('testimonis', [
            'nama'   => 'Ahmad Test',
            'status' => 'approved',
        ]);

        // Cleanup
        Testimoni::where('nama', 'Ahmad Test')->delete();
    }
}
