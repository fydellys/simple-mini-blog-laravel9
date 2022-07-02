<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.user.index');
    }

    public function update(Request $request)
    {

        $user = User::find(Auth::user()->id);

        if ($request->get('postType') == 'change-data') {

            $validated = $request->validate([
                'name' => 'required|string|max:255|min:8',
                'email' => 'required|min:4|unique:users,email,' . Auth::user()->id . ',id',
            ]);

            $user->update($request->all());
            return back()->withSuccess('Alterações realizadas com sucesso!');
        }

        if ($request->get('postType') == 'change-password') {

            $validated = $request->validate([
                'password' => 'required|confirmed|min:8',
            ]);

            $newPassword = Hash::make($request->password);

            $user->update(['password' => $newPassword]);
            return back()->withSuccess('Alterações realizadas com sucesso!');
        }

        if ($request->get('postType') == 'change-photo') {

            $validated = $request->validate([
                'photo' => 'required|image',
            ]);

            if ($request->file('photo')) {

                if (Storage::exists($user->photo)) {
                    Storage::delete($user->photo);
                }

                $newPhoto = $request->file('photo')->store('users');

                $user->update(['photo' => $newPhoto]);
                return back()->withSuccess('Alterações realizadas com sucesso!');
            }
        }
    }
}
