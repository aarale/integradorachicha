@extends('layouts.MoldeAlumnos')

@section('title', 'Finanzas')

@section('content')
    <div class="background-div">
        <div class="container mt-4">
            <h2 class="text-center">Finanzas del Alumno</h2>
            <div class="row">
                <!-- Card para cada tipo de pago -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>Mensualidad</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Referencia:</strong> 123456789</p>
                            <p><strong>Cantidad a Pagar:</strong> $500</p>
                            <p><strong>Estado:</strong> Pagado</p>
                            <p><strong>Fecha de Vencimiento:</strong> 2023-10-15</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>Examen</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Referencia:</strong> 123456789</p>

                            <p><strong>Cantidad a Pagar:</strong> $300</p>
                            <p><strong>Estado:</strong> Pendiente</p>
                            <p><strong>Fecha de Vencimiento:</strong> 2023-11-01</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>Torneo</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Referencia:</strong> 123456789</p>
                            <p><strong>Cantidad a Pagar:</strong> $150</p>
                            <p><strong>Estado:</strong> Pagado</p>
                            <p><strong>Fecha de Vencimiento:</strong> 2023-09-30</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>RUF</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Referencia:</strong> 123456789</p>
                            <p><strong>Cantidad a Pagar:</strong> $200</p>
                            <p><strong>Estado:</strong> Pendiente</p>
                            <p><strong>Fecha de Vencimiento:</strong> 2023-12-01</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>Convivio</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Referencia:</strong> 123456789</p>
                            <p><strong>Cantidad a Pagar:</strong> $100</p>
                            <p><strong>Estado:</strong> Pagado</p>
                            <p><strong>Fecha de Vencimiento:</strong> 2023-10-20</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection