@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Aggiungi utente</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input id="name" value="{{ old('name') }}"
                           type="text"
                           class="form-control"
                           name="name"
                           placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ old('email') }}"
                           type="email"
                           class="form-control"
                           name="email"
                           placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3" style="display:none">
                    <label for="username" class="form-label">Username</label>
                    <input id="username" value="{{ old('username') }}"
                           type="text"
                           class="form-control"
                           name="username"
                           placeholder="Username" required>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Salva</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Indietro</a>
            </form>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        $('#name').change(function(){
            $('#username').val($(this).val());
        });
    </script>

@endsection
