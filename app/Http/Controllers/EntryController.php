<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entree;

class EntryController extends Controller
{
    public function index()
    {
        $entrees = Entree::latest()->get();
        return view('entrees.index', compact('entrees'));
    }

    public function create()
    {
        return view('entrees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required|max:10000',
            'humeur' => 'nullable|max:50',
            'est_publique' => 'boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $request->user()->entrees()->create($data);

        return redirect()->route('entrees.index')->with('message', 'Entrée créée avec succès !');
    }

    public function show($id)
    {
        $entree = Entree::findOrFail($id);
        return view('entrees.show', compact('entree'));
    }

    public function edit($id)
    {
        $entree = Entree::findOrFail($id);
        $this->authorize('update', $entree); // à condition d'avoir une Policy ou sinon faire vérif manuelle
        return view('entrees.edit', compact('entree'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required|max:10000',
            'humeur' => 'nullable|max:50',
            'est_publique' => 'boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $entree = Entree::findOrFail($id);

        // Vérifie que l'utilisateur peut modifier
        if ($request->user()->id !== $entree->user_id) {
            abort(403);
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $entree->update($data);

        return redirect()->route('entrees.index')->with('message', 'Entrée modifiée avec succès !');
    }

    public function destroy($id)
    {
        $entree = Entree::findOrFail($id);

        if (auth()->id() !== $entree->user_id) {
            abort(403);
        }

        $entree->delete();

        return redirect()->route('entrees.index')->with('message', 'Entrée supprimée !');
    }
}
