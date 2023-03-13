<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\AdminUser;

class PageStatusAdminTest extends TestCase
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
        $admin = AdminUser::factory()->create();

        $response = $this
            ->actingAs($admin,'admin')
            ->get('/'.$uri);

        $response->assertStatus($status);
    }

    public function testProductsPageStatus()
    {
        $this->getPageStatusCase('admin/products',200);
    }

    public function testUsersPageStatus()
    {
        $this->getPageStatusCase('admin/users',200);
    }
}
