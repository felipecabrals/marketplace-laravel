<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::paginate(15);

        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        $users = User::all((['id', 'name']));

        return view('admin.stores.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $user = User::find($data['user']);
        $store = $user->store()->create($data);

        return $store;
    }

    public function edit($store)
    {
        $store = Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, $store)
    {
        $data = $request->all();

        $store = Store::find($store);
        $store->update($data);

        return $store;
    }
}