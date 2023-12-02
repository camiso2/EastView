<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;


class AuthController extends Controller
{


    /**
     * [ for logout]
     *
     * @return [type]
     *
     */
    public function logout() {
        auth()->logout();
    // redirect to homepage
    return view('welcome');
      }

}
