<?php

namespace App\Http\Controllers;

use App\Models\Plante;
use App\Helpers\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PlanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantes = Plante::latest()->get();
        return view('plantes.index', compact('plantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
        ]);

        $plante = Plante::create($request->all());

        return redirect()->route('plantes.index')
            ->with('success', 'Nouvelle plante ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function show(Plante $plante)
    {
        return view('plantes.show', compact('plante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function edit(Plante $plante)
    {
        return view('plantes.edit', compact('plante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plante $plante)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
        ]);

        $plante->update($request->all());

        return redirect()->route('plantes.index')
            ->with('success', 'Plante mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plante $plante)
    {
        $plante->delete();

        return redirect()->route('plantes.index')
            ->with('success', 'Plante supprimée !');
    }
}
