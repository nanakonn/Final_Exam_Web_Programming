<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $accounts = User::all();

        return view('admin.accountMaintenance', compact('accounts'));
    }

    public function index2($id) {
        $account = User::all()->where('id', $id)->first();

        return view('admin.updateRole', compact('account'));
    }

    public function update($id, Request $request) {
        $account = User::all()->where('id', $id)->first();

        $account->role_id = $request->role;
        $account->save();

        return redirect()->route('maintenance');
    }

    public function delete($id) {
        $account = User::all()->where('id', $id)->first();
        Storage::delete('public/profile-picture/'.$account->display_picture_link);
        $account->delete();

        return redirect()->route('maintenance');
    }
}
