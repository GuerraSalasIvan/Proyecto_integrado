<?php

namespace App\Http\Services\Public;

use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\ValidatedInput;

class LoginService
{
    public function login()
    {
        return view('login');
    }
}
