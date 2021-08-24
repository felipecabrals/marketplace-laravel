<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreRequest;
use App\Store;
use App\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $store = auth()->user()->store;

        return view('admin.stores.index', compact('store'));
    }

    public function create()
    {
        $users = User::all((['id', 'name']));

        return view('admin.stores.create', compact('users'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $user = auth()->user();
        $store = $user->store()->create($data);

        flash('Loja criada com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    public function edit($store)
    {
        $store = Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $store)
    {
        $data = $request->all();

        $store = Store::find($store);
        $store->update($data);

        flash('Loja atualizada com sucesso')->success();
        return redirect()->route('admin.stores.index');

    }

    public function destroy($store)
    {
        $store = Store::find($store);
        $store->delete();

        flash('Loja removida com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }
}
