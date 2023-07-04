@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Scarica il documento, firmalo e ricaricalo</div>

                    <div class="card-body">
                        @if($nFirma == 1)
                            <a href="/storage/documents/{{$procedura->documento_da_firmare}}" target="_blank">Scarica il documento da firmare</a><br><br>
                        @else
                            <a href="/storage/documents/{{$procedura->firma.$nFirma}}" target="_blank">Scarica il documento da firmare</a><br><br>
                        @endif
                        <form action="{{ route('proceduras.firmaupdate', [$nFirma, $procedura->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" value="{{$nFirma}}" name="nFirma">
                            <div class="form-group">
                                <label for="firma{{$nFirma}}">Carica documento firmato (PDF)</label>
                                <input required type="file" name="firma{{$nFirma}}" id="firma{{$nFirma}}" class="form-control-file" accept=".pdf">
                            </div><br>
                            <button type="submit" class="btn btn-primary">Invia il documento firmato</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
