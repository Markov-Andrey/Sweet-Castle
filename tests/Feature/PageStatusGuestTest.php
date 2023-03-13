<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageStatusGuestTest extends TestCase
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
        $response = $this->get('/'.$uri);

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

    public function testLoginPageStatus()
    {
        $this->getPageStatusCase('login',200);
    }

    public function testRegisterPageStatus()
    {
        $this->getPageStatusCase('register',200);
    }

    public function testForgotPageStatus()
    {
        $this->getPageStatusCase('forgot',200);
    }
}
