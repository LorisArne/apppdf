<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedura;

class ProceduraController extends Controller
{
    public function index()
    {
        $proceduras = Procedura::all()->sortByDesc('id');
        return view('proceduras.index', compact('proceduras'));
    }

    public function create()
    {
        return view('proceduras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_procedura' => 'required',
            'numero_firme' => 'required|integer|min:1|max:5',
            'documento_da_firmare' => 'required|mimes:pdf',
            'firmatario1' => 'email',
            'firmatario2' => 'email',
            'firmatario3' => 'email',
            'firmatario4' => 'email',
            'firmatario5' => 'email',
        ]);

        $procedura = new Procedura();
        $procedura->nome_procedura = $request->input('nome_procedura');
        $procedura->numero_firme = $request->input('numero_firme');

        if ($request->hasFile('documento_da_firmare')) {
            $file = $request->file('documento_da_firmare');
            $filename = str_replace(' ', '_', $request->input('nome_procedura')) . '_' . time() . '.pdf';
            $file->storeAs('public/documents', $filename);
            $procedura->documento_da_firmare = $filename;
        }

        $procedura->save();
        return redirect()->route('proceduras.index')->with('success', 'Procedura creata con successo.');
    }

    public function edit(Procedura $procedura)
    {
        return view('proceduras.edit', compact('procedura'));
    }

    public function update(Request $request, Procedura $procedura)
    {
        $data = $request->validate([
            'firma1' => 'nullable|file|mimes:pdf',
            'firma2' => 'nullable|file|mimes:pdf',
            'firma3' => 'nullable|file|mimes:pdf',
            'firma4' => 'nullable|file|mimes:pdf',
            'numero_firme' => 'required|integer|min:1|max:5',
        ]);

        $procedura->update($data);
        return redirect()->route('proceduras.index')->with('success', 'Procedura aggiornata con successo.');
    }

    public function destroy(Procedura $procedura)
    {
        $procedura->delete();
        return redirect()->route('proceduras.index')->with('success', 'Procedura eliminata con successo.');
    }
}
