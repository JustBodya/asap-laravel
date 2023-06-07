<?php

namespace App\Http\Controllers\Api\Pages;

use App\Http\Controllers\Controller;
use App\Http\Resources\Pages\IndexPageResource;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    public function __invoke()
    {
        return new IndexPageResource();
    }
}
