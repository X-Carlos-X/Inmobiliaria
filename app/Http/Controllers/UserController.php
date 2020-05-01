<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['user']]);
    }

    public function user($id) {
        /** @var Collection $users */
        $users = User::where('id', $id)
            ->get();

        /** @var User $user */
        $user = null;

        if (count($users) > 0) {
            $user = $users[0];
        } else {
            abort(404);
        }

        return view('user/user-profile', [
            'user' => $user
        ]);
    }

    public function create(Request $request) {
        /** @var User $currentUser */
        $currentUser = \auth()->user();

        if ($currentUser->role != User::ROLE_ADMIN) {
            abort(403);
        }

        if ($request->method() == 'POST') {
            User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            return redirect()->route('dashboard.users');
        }


        return view('form/user-form', [
            'action' => route('user.create'),
            'title' => 'Crear usuario',
            'user' => new User(),
            'require_password' => true
        ]);
    }

    public function update($id, Request $request) {
        /** @var User $currentUser */
        $currentUser = \auth()->user();

        if ($currentUser->id != $id && $currentUser->role != User::ROLE_ADMIN) {
            abort(403);
        }

        /** @var Collection $users */
        $users = User::where('id', $id)
            ->get();

        /** @var User $user */
        $user = null;

        if (count($users) > 0) {
            $user = $users[0];
        } else {
            abort(404);
        }

        if ($request->method() == 'POST') {
            $user->name = $request->get('name');
            $user->email = $request->get('email');

            if ($request->get('password')) {
                $user->password = Hash::make($request->get('password'));
            }

            $user->save();

            return redirect()->route('dashboard.users');
        }

        return view('form/user-form', [
            'action' => route('user.update', ['id' => $id]),
            'title' => 'Editar usuario',
            'user' => $user,
            'require_password' => false
        ]);
    }

    public function delete($id) {
        /** @var User $user */
        $user = \auth()->user();

        if ($user->role != User::ROLE_ADMIN) {
            abort(403);
        }

        try {
            /** @var Collection $users */
            $users = User::where('id', $id)
                ->get();

            /** @var User $vivienda */
            $user = null;

            if (count($users) > 0) {
                $user = $users[0];
            } else {
                abort(404);
            }

            $user->delete();
        } catch (\Exception $e) {
            // do nothing
        }

        return redirect()->route('dashboard.users');
    }

}