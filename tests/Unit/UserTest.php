<?php

namespace Tests\Unit;

use App\Services\AddUserService;
use Tests\TestCase;

class UserTest extends TestCase
{
   private $userService;
    private $data;
   public function setUp():void
   {
       parent::setUp();

       $this->userService = $this->app->make('App\services\AddUserService');
       $this->data = [
           'name'=>'dasdasd',
           'email'=>'zcddssadzc@ads.com',
           'password'=>'dadasdsad'
       ];
   }

    public function test_add_user(): void
    {
        $this->userService->create($this->data);

        $this->assertDatabaseHas('users',[

        ]);
    }
}
