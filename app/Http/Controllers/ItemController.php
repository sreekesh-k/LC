<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function edit(Request $request, Item $item)
    {
        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required'
        ]);
        $item->update($data);
        return redirect()->intended(route('reading'))->with('Success', 'Updated');
    }
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required'
        ]);
        $newitem = Item::create($data);
        if (!$newitem) {
            return redirect(route('create'))->with('Error', 'Couldnt process');
        }
        return redirect()->intended(route('reading'))->with('Success', 'Added');
    }
    public function delete(Item $item)
    {
        $item->delete();
        return redirect()->intended(route('reading'))->with('Success', 'Deleted');
    }

}
