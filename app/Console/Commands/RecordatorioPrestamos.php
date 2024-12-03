<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Prestamo;
use App\Notifications\PrestamoNotification;
use Carbon\Carbon;
use App\Models\Loan;
use App\Models\User;

class RecordatorioPrestamos extends Command
{
    protected $signature = 'recordatorio:prestamos';
    protected $description = 'Enviar recordatorio un día antes de la fecha de devolución';

    public function handle()
    {
        $manana = Carbon::tomorrow()->toDateString();
        $Loans = Loan::where('fecha_devolucion', $manana)->get();

        foreach ($Loans as $Loan) {
            $Users = $Loan->User; 
            $Details = [
                'nombreUsuario' => $Users->name,
                'material' => $Loan->material,
                'cantidad' => $Loan->cantidad,
                'fechaDevolucion' => $Loan->fecha_devolucion,
            ];

            $Users->notify(new PrestamoNotification($Details));
        }

        $this->info('Recordatorios enviados correctamente.');
    }
}
