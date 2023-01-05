<?php

namespace App\Http\Livewire;

use App\Models\categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    use WithFileUploads;

    public $Titulo;
    public $Salario;
    public $Categoria;
    public $Empresa;
    public $fecha;
    public $Descripcion;
    public $imagen;


    protected $rules = [
     'Titulo' => 'required|string',
     'Salario' => 'required',
     'Categoria' => 'required',
     'Empresa' => 'required',
     'fecha' => 'required',
     'Descripcion' => 'required',
     'imagen' => 'image|max:3024'
    ];

    public function render()
    {
        //consulta de la bd para la llenar un select
        $salarios = Salario::all();
        $categorias = categoria::all();
        //sepasa la variable en el view en forma de arreglo.
        return view('livewire.crear-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }

     //validacion a tiempo real 
    // public function updated($propertyName)
    // {
    //     $datos = $this->validateOnly($propertyName);
    // }

    //se manda la validacion al formulario.
    public function CrearVacante()
    {
        $datos = $this->validate();

         //almacenar la imagen 
        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        
        //Crear la vacante
        Vacante::create([
            'Titulo' => $datos['Titulo'],
            'salario_id' => $datos['Salario'],
            'categoria_id' => $datos['Categoria'],
            'Empresa' => $datos['Empresa'],
            'fecha' => $datos['fecha'],
            'Descripcion' => $datos['Descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        //Crear un mensaje
        session()->flash('mensaje', 'La vacante se publico correctamente');


        //redireccionar al usuario
        return redirect()->route('vacante.index');
    }
   
   
}
