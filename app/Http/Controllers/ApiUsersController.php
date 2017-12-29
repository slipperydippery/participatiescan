<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiUsersController extends Controller
{
    public function nomorehints(User $user)
    {
    	$user->hints = false;
    	$user->save();
    	return $user;
    }
}
