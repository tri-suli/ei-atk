<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class VisitLoginPageTest extends TestCase
{
    /**
     * Test visit login page
     *
     * @test
     * @return void
     */
    public function can_see_form_when_visiting_login_page(): void
    {
        $response = $this->get('/');

        $response->assertViewIs('pages.login');
        $response->assertSeeTextInOrder([
            'Login Form',
            'Log in',
            config('app.name'),
        ]);
    }
}
