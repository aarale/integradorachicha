@extends('layouts.MoldeAlumnos')

@section('content')
    <h2 class="mb-4">Historial de Pagos</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Referencia</th>
                <th scope="col">Método de Pago</th>
                <th scope="col">Fecha del Pago</th>
                <th scope="col">Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->reference_payment }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}</td>
                    <td>{{ $payment->payment_amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection