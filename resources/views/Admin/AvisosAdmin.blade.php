@extends('layouts.MoldeAdmin')

@section('title', 'Avisos')

@section('content')
<div class="container my-4">
    <h1 class="h3 mb-4">Notificaciones</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($avisos as $aviso)
                    <tr>
                        <td>{{ $aviso->id }}</td>
                        <td>{{ $aviso->message }}</td>
                        <td>{{ $aviso->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
