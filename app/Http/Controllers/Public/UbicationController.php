<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Services\Public\UbicationService;
use App\Models\Ubication;

class UbicationController
{
    private $service;

    public function __construct()
    {
        $this->service = new UbicationService();
    }

    public function index()
    {
        return $this->service->index();
    }

    public function show(Ubication $ubication)
    {
        return $this->service->show($ubication);
    }
}
