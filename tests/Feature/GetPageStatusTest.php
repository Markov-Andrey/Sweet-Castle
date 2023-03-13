<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetPageStatusTest extends TestCase
{
    /**
     * The main method for checking get status
     *
     * @param string $uri
     */
    private function getPageStatusCase(string $uri)
    {
        $response = $this->get('/'.$uri);

        $response->assertStatus(200);
    }

    public function testHomePageStatus()
    {
        $this->getPageStatusCase('');
    }

    public function testProductsPageStatus()
    {
        $this->getPageStatusCase('products');
    }

    public function testContactsPageStatus()
    {
        $this->getPageStatusCase('contacts');
    }

    public function testLoginPageStatus()
    {
        $this->getPageStatusCase('login');
    }

    public function testRegisterPageStatus()
    {
        $this->getPageStatusCase('register');
    }

    public function testForgotPageStatus()
    {
        $this->getPageStatusCase('forgot');
    }
}
