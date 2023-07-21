@extends('layouts.app-master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nuova Procedura</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('proceduras.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nome_procedura">Nome Procedura:</label>
                                <input type="text" name="nome_procedura" id="nome_procedura" class="form-control" value="{{ old('nome_procedura') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="numero_firme">Numero Firme:</label>
                                <select name="numero_firme" id="numero_firme" class="form-control" required>
                                    <option selected></option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ old('numero_firme') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div id="firmatario_container"></div>
                            <div class="form-group">
                                <label for="documento_da_firmare">Documento da Firmare (PDF):</label>
                                <input type="file" name="documento_da_firmare" id="documento_da_firmare" class="form-control-file" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Crea Procedura</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#numero_firme').change(function() {
                var numFirme = $(this).val();
                var firmaContainer = $('#firmatario_container');

                // Rimuovi tutti i campi dei firmatari precedenti
                firmaContainer.empty();

                // Genera i nuovi campi dei firmatari in base al numero selezionato
                for (var i = 1; i <= numFirme; i++) {
                    var inputHtml = '<div class="form-group">';
                    inputHtml += '<label for="firmatario' + i + '">Firma ' + i + ':</label>';
                    inputHtml += '<select name="firmatario' + i + '" id="firmatario' + i + '" class="form-control firmatario" value="" required>';
                    inputHtml += '<option></option>';
                    <?php
                        foreach($users as $user){
                            $option = '<option value="'.$user->id.'">'.$user->email.' '.$user->name.'</option>';
                            echo 'inputHtml += \''.$option.'\';';

                        }
                    ?>
                    inputHtml += '</select>';

                    inputHtml += '</div>';

                    firmaContainer.append(inputHtml);
                    $('.firmatario').select2();
                }
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- Aggiungi il CSS di Select2 dal CDN di jsDelivr -->


@endsection
