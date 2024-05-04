<?php

namespace App\Http\Controllers\Public;

use App\Http\Services\Public\LoginService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new LoginService();
    }

    public function login(): View
    {
        return $this->service->login();
    }
}
