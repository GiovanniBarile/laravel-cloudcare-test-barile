<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Http;

class BeerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = ($request->input('page')) ? $request->input('page') : 1;
        $response = Http::get('https://api.punkapi.com/v2/beers?page='.$page);
        return $response->body();
    }

}
