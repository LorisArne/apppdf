@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Procedura: {{ $procedura->nome_procedura }}</div>
                    <div class="card-header">Scarica il documento, firmalo e ricaricalo</div>

                    <div class="card-body">
                        @if($nFirma == 1)
                            <a href=" {{route('file.download', ['filename' => $procedura->documento_da_firmare]) }}" target="_blank">Scarica il documento da firmare</a><br><br>
                        @else
                            @switch($nFirma)
                                @case(2)
                                    @php
                                        $daFirmare = $procedura->firma1;
                                    @endphp
                                    @break
                                @case(3)
                                    @php
                                      $daFirmare = $procedura->firma2;
                                    @endphp
                                    @break
                                @case(4)
                                    @php
                                      $daFirmare = $procedura->firma3;
                                    @endphp
                                    @break
                                @case(5)
                                    @php
                                      $daFirmare = $procedura->firma4;
                                    @endphp
                                    @break
                                @default
                                    @php
                                      die()
                                    @endphp
                            @endswitch

                            <a href="{{ route('file.download', ['filename' => $daFirmare]) }}" target="_blank">Scarica il documento da firmare</a><br><br>
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
