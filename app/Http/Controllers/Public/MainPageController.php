<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Services\Public\MainPageService;

class MainPageController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new MainPageService();
    }

    public function index()
    {
        return $this->service->index();
    }
}
