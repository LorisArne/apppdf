@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifica Procedura</div>

                    <div class="card-body">
                        <form action="{{ route('proceduras.update', $procedura->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="firma1">Firma 1</label>
                                <input type="file" name="firma1" id="firma1" class="form-control-file" accept=".pdf">
                            </div>
                            <div class="form-group">
                                <label for="firma2">Firma 2</label>
                                <input type="file" name="firma2" id="firma2" class="form-control-file" accept=".pdf">
                            </div>
                            <div class="form-group">
                                <label for="firma3">Firma 3</label>
                                <input type="file" name="firma3" id="firma3" class="form-control-file" accept=".pdf">
                            </div>
                            <div class="form-group">
                                <label for="firma4">Firma 4</label>
                                <input type="file" name="firma4" id="firma4" class="form-control-file" accept=".pdf">
                            </div>
                            <div class="form-group">
                                <label for="numero_firme">Numero Firme</label>
                                <select name="numero_firme" id="numero_firme" class="form-control">
                                    <option value="1" {{ $procedura->numero_firme == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $procedura->numero_firme == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $procedura->numero_firme == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $procedura->numero_firme == 4 ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $procedura->numero_firme == 5 ? 'selected' : '' }}>5</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Aggiorna</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
