<?php

namespace App\Http\Controllers;

use App\Models\Agriculteur;
use App\Helpers\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgriculteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agriculteurs = Agriculteur::latest()->get();
        return view('agriculteurs.index', compact('agriculteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agriculteurs.create');
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
            'age' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'whatsapp' => ['required', 'string', 'max:255'],
        ]);

        $agriculteur = Agriculteur::create($request->all());

        return redirect()->route('agriculteurs.index')
            ->with('success', 'Nouveau agriculteur ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function show(Agriculteur $agriculteur)
    {
        return view('agriculteurs.show', compact('agriculteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Agriculteur $agriculteur)
    {
        return view('agriculteurs.edit', compact('agriculteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agriculteur $agriculteur)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
        ]);

        $agriculteur->update($request->all());

        return redirect()->route('agriculteurs.index')
            ->with('success', 'Agriculteur mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agriculteur $agriculteur)
    {
        $agriculteur->delete();

        return redirect()->route('agriculteurs.index')
            ->with('success', 'Agriculteur supprimé !');
    }
}