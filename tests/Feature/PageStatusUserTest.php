<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class PageStatusUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The main method for checking get status
     *
     * @param string $uri
     * @param $status
     */

    private function getPageStatusCase(string $uri, $status)
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user,'web')
            ->get('/'.$uri);

        $response->assertStatus($status);
    }

    public function testHomePageStatus()
    {
        $this->getPageStatusCase('',200);
    }

    public function testProductsPageStatus()
    {
        $this->getPageStatusCase('products',200);
    }

    public function testContactsPageStatus()
    {
        $this->getPageStatusCase('contacts',200);
    }

    public function testLoginPageNoAccess()
    {
        $this->getPageStatusCase('login',302);
    }

    public function testRegisterPageNoAccess()
    {
        $this->getPageStatusCase('register',302);
    }

    public function testForgotPageNoAccess()
    {
        $this->getPageStatusCase('forgot',302);
    }
}
