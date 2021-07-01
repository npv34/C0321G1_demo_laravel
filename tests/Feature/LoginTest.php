<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_form_login()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('login');
        $response->assertSeeText('Welcome Back');
    }

    public function test_login_with_email_and_password_null()
    {
        $this->addNNewUser();

        $data = [
            'email' => null,
            'password' => null
        ];

        $response = $this->post('login', $data);
        $response->assertStatus(302);

        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('login');
        $response->assertSeeText('Tai khoan hoac mat khau khong chinh xac!');


    }

    public function test_login_with_email_null()
    {
        $this->addNNewUser();

        $data = [
            'email' => null,
            'password' => '123456'
        ];

        $response = $this->post('login', $data);
        $response->assertStatus(302);

        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('login');
        $response->assertSeeText('Tai khoan hoac mat khau khong chinh xac!');
    }

    public function test_login_with_password_null()
    {
        $this->addNNewUser();

        $data = [
            'email' => 'a@gmail.com',
            'password' => null
        ];

        $response = $this->post('login', $data);
        $response->assertStatus(302);

        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('login');
        $response->assertSeeText('Tai khoan hoac mat khau khong chinh xac!');
    }

    public function test_login_with_account_not_exist()
    {
        $this->addNNewUser();

        $data = [
            'email' => 'a@gmail.com',
            'password' => '123456'
        ];

        $response = $this->post('login', $data);
        $response->assertStatus(302);

        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('login');
        $response->assertSeeText('Tai khoan hoac mat khau khong chinh xac!');
    }

    public function test_login_success()  {
        $this->addNNewUser();

        $data = [
            'email' => 'ngoc@gmail.com',
            'password' => '123456'
        ];

        $response = $this->post('login', $data);
        $response->assertStatus(302);
        $response->assertRedirect('admin/dashboard');

    }
}
