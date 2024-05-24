<?php

namespace App\Http\Controllers\Public;

use App\Http\Services\Public\LoginService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new LoginService();
    }

    public function login()
    {
        return $this->service->login();
    }
}
