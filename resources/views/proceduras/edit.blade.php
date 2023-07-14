@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifica Procedura</div>
<?php  use App\Models\User; ?>
                    <div class="card-body">
                        <form action="{{ route('proceduras.update', $procedura->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @for($i=1; $i<=$procedura->numero_firme; $i++ )

                            <div class="form-group">
                                <label for="firma{{$i}}">Firma {{$i}}</label>
{{--                                <input type="file" name="firma{{$i}}" id="firma{{$i}}" class="form-control-file" accept=".pdf">--}}
                                @switch($i)
                                    @case(1)
                                        @if($procedura->firma1 !== null)
                                            <a target="_blank" href="{{ route('file.download', ['filename' => $procedura->firma1]) }}">Scarica il documento</a>
                                        @else
                                            Da Firmare!
                                        @endif
                                           - Firmatario: <?php

                                                $user = User::where('id', $procedura->firmatario1)->first();
                                                echo $user->email;
                                                ?>
                                        @break
                                    @case(2)
                                        @if($procedura->firma2 !== null)
                                            <a target="_blank" href="{{ route('file.download', ['filename' => $procedura->firma2]) }}">Scarica il documento</a>
                                        @else
                                            Da Firmare!
                                        @endif
                                           - Firmatario: <?php

                                                $user = User::where('id', $procedura->firmatario2)->first();

                                                echo $user->email;
                                                ?>
                                        @break
                                    @case(3)
                                        @if($procedura->firma3 !== null)
                                            <a target="_blank" href="{{ route('file.download', ['filename' => $procedura->firma3]) }}">Scarica il documento</a>
                                        @else
                                            Da Firmare!
                                        @endif
                                           - Firmatario: <?php

                                                $user = User::where('id', $procedura->firmatario3)->first();
                                                echo $user->email;
                                                ?>
                                        @break
                                    @case(4)
                                        @if($procedura->firma3 !== null)
                                            <a target="_blank" href="{{ route('file.download', ['filename' => $procedura->firma4]) }}">Scarica il documento</a>
                                        @else
                                            Da Firmare!
                                        @endif
                                           - Firmatario: <?php

                                                $user = User::where('id', $procedura->firmatario4)->first();
                                                echo $user->email;
                                                ?>
                                        @break
                                    @case(5)
                                        @if($procedura->firma5 !== null)
                                            <a target="_blank" href="{{ route('file.download', ['filename' => $procedura->firma5]) }}">Scarica il documento</a>
                                        @else
                                            Da Firmare!
                                        @endif
                                           - Firmatario: <?php

                                                $user = User::where('id', $procedura->firmatario5)->first();
                                                echo $user->email;
                                                ?>
                                        @break
                                    @default
                                        @break
                                @endswitch
                            </div>
                            @endfor

{{--                            <button type="submit" class="btn btn-primary">Aggiorna</button>--}}
                            <a href="{{route('proceduras.index')}}" >Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
