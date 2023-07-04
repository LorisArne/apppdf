@extends('layouts.app-master')

@section('content')

    <h1 class="mb-3"></h1>

    <div class="bg-light p-4 rounded">
        <h1>Utenti</h1>
        <div class="lead">
            Gestione utenti
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Aggiungi</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Nome</th>
                <th scope="col">Email</th>
                <th scope="col" width="10%">Roles</th>
                <th scope="col" width="1%" colspan="3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <?php // <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm">Vedi</a></td> ?>
                    <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Modifica</a></td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Elimina', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $users->links() !!}
        </div>

    </div>
@endsection
