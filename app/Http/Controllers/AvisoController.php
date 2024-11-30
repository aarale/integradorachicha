<?php

namespace App\Http\Controllers;


class AvisoController extends Controller
{
   public function index()
   {
       return view('Profesor.ConsultarAvisos');
   }
}
