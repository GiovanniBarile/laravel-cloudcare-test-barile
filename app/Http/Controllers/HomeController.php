<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1);

        if ($request->session()->has('token')) {
            $beers = $this->fetchBeers($request, $page);
        } else {
            if ($this->attemptLogin($request)) {
                $user = Auth::user();
                $token = $user->createToken('CloudBeers')->accessToken;
                $request->session()->put('token', $token);
                $beers = $this->fetchBeers($request, $page);
            } else {
                return redirect('/login');
            }
        }

        return view('dashboard', compact('beers', 'page'));
    }

    protected function fetchBeers(Request $request, $page)
    {
        $response = Http::get('https://api.punkapi.com/v2/beers', [
            'page' => $page,
            'per_page' => 8,
        ]);

        return json_decode($response->body());
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::attempt(['username' => $request->username, 'password' => $request->password]);
    }
}
