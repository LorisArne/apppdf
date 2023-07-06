<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NuovaProceduraDiFirmaNotification;
use App\Notifications\NuovaProceduraDiFirmaNotificationAdmin;
use Illuminate\Http\Request;
use App\Models\Procedura;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class ProceduraController extends Controller
{
    public function index()
    {
        $proceduras = Procedura::all()->sortByDesc('id');
        return view('proceduras.index', compact('proceduras'));
    }

    public function create()
    {
        $users = User::all();

        return view('proceduras.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_procedura' => 'required',
            'numero_firme' => 'required|integer|min:1|max:5',
            'documento_da_firmare' => 'required|mimes:pdf',
            'firmatario1' => 'integer',
            'firmatario2' => 'integer',
            'firmatario3' => 'integer',
            'firmatario4' => 'integer',
            'firmatario5' => 'integer',

        ]);

        $id_creator = Auth::id();

        $procedura = new Procedura();
        $procedura->nome_procedura = $request->input('nome_procedura');
        $procedura->numero_firme = $request->input('numero_firme');
        $procedura->firmatario1 = $request->input('firmatario1');
        if($request->input('firmatario2') !== null){
            $procedura->firmatario2 = $request->input('firmatario2');
        }
        if($request->input('firmatario3') !== null){
            $procedura->firmatario3 = $request->input('firmatario3');
        }
        if($request->input('firmatario4') !== null){
            $procedura->firmatario4 = $request->input('firmatario4');
        }
        if($request->input('firmatario5') !== null){
            $procedura->firmatario5 = $request->input('firmatario5');
        }

        $procedura->creator = $id_creator;

        if ($request->hasFile('documento_da_firmare')) {
            $file = $request->file('documento_da_firmare');
            $filename = str_replace(' ', '_', $request->input('nome_procedura')) . '_' . time() . '.pdf';
            $file->storeAs('public/documents', $filename);
            $procedura->documento_da_firmare = $filename;
        }

        $procedura->save();
$nFirma = 1;
        $notificaFirmatario1 = User::where('id', $procedura->firmatario1)->first();
        if ($notificaFirmatario1) {
            //Notification::send($notificaFirmatario1, new NuovaProceduraDiFirmaNotification($procedura, 1));
            var_dump('invio mail a '.$notificaFirmatario1->email);
            var_dump('/proceduras/'.$nFirma.'/' . $procedura->id."/firma");
            die();
        }

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
        $path=storage_path('app/public/documents');

        File::delete($path.'/'.$procedura->documento_da_firmare);
        if($procedura->firma1 !== null){
            File::delete($path.'/'.$procedura->firma1);
        }
        if($procedura->firma2 !== null){
            File::delete($path.'/'.$procedura->firma2);
        }
        if($procedura->firma3 !== null){
            File::delete($path.'/'.$procedura->firma3);
        }
        if($procedura->firma4 !== null){
            File::delete($path.'/'.$procedura->firma4);
        }
        if($procedura->firma5 !== null){
            File::delete($path.'/'.$procedura->firma5);
        }

        $procedura->delete();
        return redirect()->route('proceduras.index')->with('success', 'Procedura eliminata con successo.');
    }

    public function firmaProcedura($nFirma, $procedura, Request $request){

//correggere la validazione



        $userId = Auth::id();

        $proceduraObject = Procedura::find($procedura);



        switch($nFirma){

            case 1:
                $firmatario = $proceduraObject->firmatario1;
                break;
            case 2:
                $firmatario = $proceduraObject->firmatario2;
                break;
            case 3:
                $firmatario = $proceduraObject->firmatario3;
                break;
            case 4:
                $firmatario = $proceduraObject->firmatario4;
                break;
            case 5:
                $firmatario = $proceduraObject->firmatario5;
                break;

        }

        if($userId != $firmatario){
            die('errore');
        }
        return view('proceduras.firma', ['nFirma' => $nFirma, 'procedura' => $proceduraObject]);

    }

    public function firmaProceduraUpdate($nFirma, $idProcedura, Request $request){
        $procedura = Procedura::find($idProcedura)->first();

        $keyFile = "firma".$nFirma;


        if ($request->hasFile($keyFile)) {
            $file = $request->file($keyFile);
            $filename = str_replace(' ', '_', $procedura->nome_procedura) . '_firma'.$nFirma."_" . time() . '.pdf';
            $file->storeAs('public/documents', $filename);
            switch ($nFirma){
                case 1:
                    $procedura->firma1 = $filename;
                    break;
                case 2:
                    $procedura->firma2 = $filename;
                    break;
                case 3:
                    $procedura->firma3 = $filename;
                    break;
                case 4:
                    $procedura->firma4 = $filename;
                    break;
                case 5:
                    $procedura->firma5 = $filename;
                    break;
                default:
                    die();
            }

        }
        $procedura->save();

        //mandare la mail di firma
        if($nFirma < $procedura->numero_firme) {
            switch ($nFirma) {
                case 1:
                    $userId = $procedura->firmatario2;
                    break;
                case 2:
                    $userId = $procedura->firmatario3;
                    break;
                case 3:
                    $userId = $procedura->firmatario4;
                    break;
                case 4:
                    $userId = $procedura->firmatario5;
                    break;
                default:
                    die();
            }

            $notificaFirmatario = User::where('id', $userId)->first();



            if ($notificaFirmatario !== null && $nFirma < $procedura->numero_firme) {
                Notification::send($notificaFirmatario, new NuovaProceduraDiFirmaNotification($procedura, $nFirma));
                //dd($notificaFirmatario);

            }
        }


        if ($nFirma == $procedura->numero_firme) {
                $creator = User::where('id', $procedura->creator)->first();
                //dd($creator);
                Notification::send($creator, new NuovaProceduraDiFirmaNotificationAdmin($procedura, $nFirma));
        }

        return view('proceduras.firmato');
    }



}
