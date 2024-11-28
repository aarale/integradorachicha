@extends('layouts.MoldeTeachers')

@section('title', 'Mis Clases')

@section('content')
<h1 class="text-center mb-4">Mis Clases</h1>

<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <div class="table-responsive">
      <table class="table table-bordered w-100">
        <thead class="table-dark">
            <tr>
                <th>Clase</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
            </tr>
        </thead>
      </table>
    </div>
    
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        <!-- Fila de la tabla dentro del acordeón -->
        <div class="table-responsive w-100">
          <table class="table table-bordered w-100">
            <tbody>
                <tr>
                    <td>Clase 7-9</td>
                    <td>Jueves</td>
                    <td>7:00</td>
                    <td>9:00</td>
                </tr>
            </tbody>
          </table>
        </div>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div class="accordion-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Cintas</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alejandro Ortiz</td>
                    <td>Negra</td>
                    <td>23</td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
