<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_list_group_with_data_null()
    {
        $this->isLogin();
        $response = $this->get('/admin/groups');
        $response->assertStatus(200);
        $response->assertSeeText('No data');
        $response->assertViewIs('admin.groups.list');
    }
}
