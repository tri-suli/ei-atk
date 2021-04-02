<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LoginTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * Start the application session's
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        session()->start();
    }

    /**
     * Test negative feedback
     *
     * @test
     * @dataProvider credentialsDataProvider
     * @param  string $key
     * @return void
     */
    public function invalid_credentials(string $key): void
    {
        $user = User::factory()->create();

        $response = $this->post('login', [
            'password' => 12345678,
            '_token' => csrf_token(),
            'username' => $user[$key],
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('error', 'Invalid Credentials');
    }

    /**
     * Test positive feedback
     *
     * @test
     * @dataProvider credentialsDataProvider
     * @param  string $key
     * @return void
     */
    public function successfully_logged_in_into_dashboard(string $key): void
    {
        $user = User::factory()->create();

        $response = $this->post('login', [
            '_token' => csrf_token(),
            'password' => 'password',
            'username' => $user[$key],
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHasNoErrors();
    }

    /**
     * @return array
     */
    public function credentialsDataProvider(): array
    {
        return [
            'login using email' => ['email'],
            'login using username' => ['name'],
        ];
    }
}
