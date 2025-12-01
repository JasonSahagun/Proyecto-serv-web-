<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    //CRUD  crear Read,Update y Delete 

    Public function indice(){
        return "muestra la lista de categorias";
    }

    Public function crear(){
        return "Muestra el formulario para registrar una categoria";
    }

    Public function guardar(){
        return "Crea un nuevo registro";
    }

    Public function editar(){
        return "Muestra los datos para su actualizacion";
    }

    Public function actualizar(){
        return "Actualiza los datos";
    }

    Public function mostrar(){
        return "Muestra la informacion del registro"; 
    }

    Public function borrar(){
        return "Borra el registro"; 
    }
}
