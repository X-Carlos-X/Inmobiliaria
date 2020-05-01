<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Vivienda;
use Illuminate\View\View;

class ViviendaController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function vivienda($id) {
        /** @var Collection $viviendas */
        $viviendas = Vivienda::where('id', $id)->get();
        /** @var Vivienda $vivienda */
        $vivienda = null;

        if (count($viviendas) > 0) {
            $vivienda = $viviendas[0];
        } else {
            abort(404);
        }

        return view('vivienda', [
            'vivienda' => $vivienda
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Request $request) {
        if ($request->method() == Request::METHOD_POST) {
            /** @var User $user */
            $user = \auth()->user();
            $user->viviendas()->create([
                'titulo' => $request->get('titulo'),
                'precio' => $request->get('precio'),
                'descripcion' => $request->get('descripcion'),
                'valoracion' => 0,
            ]);

            return redirect()->route('dashboard.viviendas');
        }

        return view('form/vivienda-form', [
            'title' => 'Crear vivienda',
            'action' => '/vivienda/create',
            'vivienda' => new Vivienda(),
            'submit_label' => 'Crear'
        ]);
    }

    public function update(int $id, Request $request) {
        /** @var User $user */
        $user = \auth()->user();

        /** @var Collection $viviendas */
        if ($user->role == User::ROLE_ADMIN) {
            $viviendas = Vivienda::where('id', $id)
                ->get();
        } else {
            $viviendas = Vivienda::where('id', $id)
                ->where('usuario', $user->id)
                ->get();
        }

        /** @var Vivienda $vivienda */
        $vivienda = null;

        if (count($viviendas) > 0) {
            $vivienda = $viviendas[0];
        } else {
            abort(404);
        }

        if ($request->method() == Request::METHOD_POST) {
            $vivienda->titulo = $request->get('titulo');
            $vivienda->precio = $request->get('precio');
            $vivienda->descripcion = $request->get('descripcion');
            $vivienda->save();

            return redirect()->route('dashboard.viviendas');
        }

        return view('form/vivienda-form', [
            'title' => 'Actualizar vivienda',
            'action' => '/vivienda/update/' . $id,
            'vivienda' => $vivienda,
            'submit_label' => 'Actualizar'
        ]);
    }

    public function delete(int $id) {
        try {
            /** @var User $user */
            $user = \auth()->user();

            /** @var Collection $viviendas */
            if ($user->role == User::ROLE_ADMIN) {
                $viviendas = Vivienda::where('id', $id)
                    ->get();
            } else {
                $viviendas = Vivienda::where('id', $id)
                    ->where('usuario', $user->id)
                    ->get();
            }

            /** @var Vivienda $vivienda */
            $vivienda = null;

            if (count($viviendas) > 0) {
                $vivienda = $viviendas[0];
            } else {
                abort(404);
            }

            $vivienda->delete();
        } catch (\Exception $e) {
            abort(403);
        }

        return redirect()->route('dashboard.viviendas');
    }
}
