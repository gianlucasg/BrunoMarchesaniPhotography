<?php

namespace App\Http\Controllers;

use App\Mail\ContactMailModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;

class ContactMail extends Controller
{
    public function sendEmail(Request $request){
        $data = [
            'nombre' => $request->nombrecompleto,
            'correo' => $request->email,
            'telefono' => $request->telefono,
            'motivo' => $request->motivo,
            'consulta' => $request->consulta
        ];
        Mail::to('brunomarchesaniphotography@gmail.com')->send(new ContactMailModal($data['nombre'],$data['correo'],$data['telefono'],$data['motivo'],$data['consulta'],));
        if (Mail::failures()) {
            error_log('entre aca');
            $envie=0;
            return response()->json($envie,500);
        }
        else {
            error_log('entre true');
            $envie=1;
            return response()->json($envie,200);
        }
        error_log($envie);
        error_log('hola');
        
    }
}
