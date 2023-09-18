<?php

namespace App\Http\Controllers;

use App\Services\AddUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function store(Request $request,AddUserService $service)
   {
      return  $service->create($request->all());
   }
}
