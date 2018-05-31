<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Home page
     * @return View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Search GitHub users
     * @param  Request $request
     * @return View
     */
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:4'
        ]);

        $client = new Client;
        $response = $client->request('GET', 'https://api.github.com/search/users?q=' . $request->input('query'));

        $users = json_decode($response->getBody())->items;

        return view('search', compact('users'));
    }

    /**
     * GitHub user page
     * @param  String $user
     * @return View
     */
    public function user($user)
    {
        return view('user', compact('user'));
    }
}
