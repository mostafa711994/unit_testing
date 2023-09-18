<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeatureUserTest extends TestCase
{
    private $userService;
    private $data;
    public function setUp():void
    {
        parent::setUp();

        $this->userService = $this->app->make('App\services\AddUserService');
        $this->data = [
            'name'=>'dasdasd',
            'email'=>'z@ads.com',
            'password'=>'dadasdsad'
        ];
    }

    public function test_feature_add_user(): void
    {
        $response = $this->post('/users/store',$this->data);

        $response->assertStatus(201);

    }
    public function test_feature_add_user_with_auth(): void
    {
        $response = $this->withHeaders(['Accept'=>'application/json'])->post('/users/store',$this->data);

        $response->assertStatus(401);

    }
    public function test_feature_add_user_with_auth_success(): void
    {
        $user = User::first();
        $response = $this->withHeaders(['Accept'=>'application/json'])
            ->actingAs($user)->post('/users/store',$this->data);

        $response->assertStatus(201);

    }
}
