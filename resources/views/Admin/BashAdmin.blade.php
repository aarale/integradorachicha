@extends('layouts.MoldeAdmin')

@section('content')
<div class="container">
    <h2 class="mb-4">Panel de Administración</h2>

    <div class="row">
        <!-- Finanzas de Alumnos -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Finanzas de Alumnos</h5>
                </div>
                <div class="card-body">
                    <p>Total de ingresos: ${{ $totalIngresos }}</p>
                    <p>Total de egresos: ${{ $totalEgresos }}</p>
                    <p>Balance: ${{ $balance }}</p>
                    <a href="{{ route('finanzas.index') }}" class="btn btn-primary">Ver Detalles</a>
                </div>
            </div>
        </div>

        <!-- Exámenes -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Exámenes</h5>
                </div>
                <div class="card-body">
                    <p>Total de exámenes realizados: {{ $totalExamenes }}</p>
                    <p>Próximos exámenes: {{ $proximosExamenes }}</p>
                    <a href="{{ route('examenes.index') }}" class="btn btn-primary">Ver Detalles</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Clases Creadas por Profesores -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Clases Creadas por Profesores</h5>
                </div>
                <div class="card-body">
                    <p>Total de clases: {{ $totalClases }}</p>
                    <p>Clases activas: {{ $clasesActivas }}</p>
                    <a href="{{ route('profesor.clases') }}" class="btn btn-primary">Ver Detalles</a>
                </div>
            </div>
        </div>

        <!-- Asistencias -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Asistencias</h5>
                </div>
                <div class="card-body">
                    <p>Total de asistencias registradas: {{ $totalAsistencias }}</p>
                    <p>Asistencias del mes: {{ $asistenciasMes }}</p>
                    <a href="{{ route('profesor.asistencia') }}" class="btn btn-primary">Ver Detalles</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Inventario -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Inventario</h5>
                </div>
                <div class="card-body">
                    <p>Total de artículos en inventario: {{ $totalInventario }}</p>
                    <p>Artículos críticos: {{ $articulosCriticos }}</p>
                    <a href="{{ route('inventario.index') }}" class="btn btn-primary">Ver Detalles</a>
                </div>
            </div>
        </div>

        <!-- Préstamos -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Préstamos</h5>
                </div>
                <div class="card-body">
                    <p>Total de préstamos realizados: {{ $totalPrestamos }}</p>
                    <p>Préstamos activos: {{ $prestamosActivos }}</p>
                    <a href="{{ route('prestamos.index') }}" class="btn btn-primary">Ver Detalles</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection