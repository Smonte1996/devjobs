<div>
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @forelse($vacantes as $vacante)
    <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
        <div class="space-y-3">
        <a href="{{route('vacante.show', $vacante->id)}}" class="text-xl font-bold">
        {{ $vacante->Titulo}}
    </a>
            <p class="text-sm text-gray-600 font-bold">{{$vacante->Empresa}}</p>
            <p class="text-sm text-gray-500">Ultimo dia: {{ $vacante->fecha->format('d/m/y')}}</p>
    </div>
    <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
     <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">Candidatos</a>

     <a href="{{ route('vacante.edit', $vacante->id)}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">Editar</a>

     <button wire:click="$emit('mostrarAlerta', {{$vacante->id}}) " class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">Eliminar</button>

    </div>
    </div>
    @empty
      <p class="text-center p-3 text-gray-400 text-sm "> No hay vacantes publicada</p>
    @endforelse
</div>
<div class="flex justify-center mt-10">
    {{$vacantes->links()}}
</div>
</div>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    livewire.on('mostrarAlerta', vacanteId =>{
        Swal.fire({
            title: '¿Eliminar Vacante?',
            text: "Una vacante eliminada no se puede recuperar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
            if (result.isConfirmed) {
                livewire.emit('eliminarVacante', vacanteId)
                Swal.fire(
                'Eliminado!',
                'Vacante Eliminada correctamente.',
                'success'
                )
            }
            })
    })
    // El siguiente código es el Alert utilizado

           
</script>    
@endpush