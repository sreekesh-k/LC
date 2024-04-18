<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public  function home()
    {
        return view('welcome');
    }
    public  function login()
    {
        return view('login');
    }
    public  function register()
    {
        return view('register');
    }
    public  function reading()
    {
        $items = Item::all();
        return view('reading', ['items' => $items]);
    }

    public function edit()
    {
        return view('edit');
    }
    public function create()
    {
        return view('create');
    }
}
