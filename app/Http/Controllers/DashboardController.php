<?php


namespace App\Http\Controllers;


use App\User;
use App\Vivienda;
use Illuminate\Database\Eloquent\Collection;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function dashboard() {
        return view('dashboard/dashboard');
    }

    public function viviendas() {
        /** @var User $user */
        $user = \auth()->user();

        /** @var Collection $viviendas */
        if ($user->role == User::ROLE_ADMIN) {
            $viviendas = Vivienda::all();
        } else {
            $viviendas = Vivienda::where('usuario', $user->id)->get();
        }

        return view('dashboard/dashboard-viviendas', [
            'viviendas' => $viviendas
        ]);
    }

    public function users() {
        /** @var User $user */
        $user = \auth()->user();

        if ($user->role != User::ROLE_ADMIN) {
            abort(403);
        }

        /** @var Collection $viviendas */
        $users = User::all();

        return view('dashboard/dashboard-users', [
            'users' => $users,
            'current_user' => $user
        ]);
    }
}