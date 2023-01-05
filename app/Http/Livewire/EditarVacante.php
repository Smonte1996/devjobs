<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EditarVacante extends Component
{ 
    public $vacante_id;
    public $Titulo;
    public $Salario;
    public $Categoria;
    public $Empresa;
    public $fecha;
    public $Descripcion;
    public $imagen;
    public $imagen_nueva;
 
    use WithFileUploads;

    protected $rules = [
     'Titulo' => 'required|string',
     'Salario' => 'required',
     'Categoria' => 'required',
     'Empresa' => 'required',
     'fecha' => 'required',
     'Descripcion' => 'required',
     'imagen_nueva' => 'nullable|image|max:2024'
    ];

    public function render()
    { 
        $salarios = Salario::all();
        $categorias = categoria::all();

        return view('livewire.editar-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
     //para llenar los campos de la vacantes 
     public function mount(Vacante $vacante)
     {
        $this->vacante_id = $vacante->id; //esto no va a funcionar.
        $this->Titulo = $vacante->Titulo;
        $this->Salario = $vacante->salario_id;
        $this->Categoria = $vacante->categoria_id;
        $this->Empresa = $vacante->Empresa;
        $this->fecha = Carbon::parse($vacante->fecha)->format('Y-m-d');
        $this->Descripcion = $vacante->Descripcion;
        $this->imagen = $vacante->imagen;
     }

     public function updated($propertyName)
     {
        $datos = $this->validateOnly($propertyName);
     }

     public function editarvacante()
     {
        // validamos los campos requeridos. 
          $datos = $this->validate();

          //si hay una nueva imagen 
         if ($this->imagen_nueva){
           $imagen = $this->imagen_nueva->store('public/vacantes');
           $datos['imagen'] = str_replace('public/vacantes/', '' , $imagen);
        //    Storage::delete('public/vacantes/'.$vacante->imagen);
         };
          // encontar la vacante a editar 
          $vacante = Vacante::find($this->vacante_id);
          //asignar los valores 
          $vacante->Titulo = $datos['Titulo'];
          $vacante->salario_id = $datos['Salario'];
          $vacante->categoria_id = $datos['Categoria'];
          $vacante->Empresa = $datos['Empresa'];
          $vacante->fecha = $datos['fecha'];
          $vacante->Descripcion = $datos['Descripcion'];
          $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;

      
          //Guardar cambios
          $vacante->save();

          //redirreccionar y enviar message.
          session()->flash('mensaje', 'La vacante se actualizo correctamente');

          return redirect()->route('vacante.index');
     }
    
}
