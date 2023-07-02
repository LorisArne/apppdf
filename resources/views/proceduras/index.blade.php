@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista delle Procedure</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <a href="{{ route('proceduras.create') }}" class="btn btn-primary">Nuova Procedura</a>
                        </div>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Procedura</th>
                                    <th>Numero Firme</th>
                                    <th>Documento da Firmare</th>
                                    <th>Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($proceduras as $procedura)
                                    <tr>
                                        <td>{{ $procedura->id }}</td>
                                        <td>{{ $procedura->nome_procedura }}</td>
                                        <td>{{ $procedura->numero_firme }}</td>
                                        <td>
                                            @if ($procedura->documento_da_firmare)
                                                <a href="{{ asset('storage/documents/' . $procedura->documento_da_firmare) }}" target="_blank">Apri Documento</a>
                                            @else
                                                Nessun Documento
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('proceduras.edit', $procedura->id) }}" class="btn btn-primary">Modifica</a>
                                            <form action="{{ route('proceduras.destroy', $procedura->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa procedura?')">Elimina</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
