<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function edit()
    {
    }
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required'
        ]);
        $newitem = Item::create($data);
        if(!$newitem){
            return redirect(route('create'))->with('Error','Couldnt process');
        }
        return redirect()->intended(route('reading'));
    }
    public function detele()
    {
    }
}
