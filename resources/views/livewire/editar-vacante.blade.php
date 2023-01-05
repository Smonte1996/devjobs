 <div class="md:w-1/2 space-y-5">
 
    <div>
        <x-input-label for="Titulo" :value="__('Titulo')" />
        <x-text-input id="Titulo" class="block mt-1 w-full" type="text" wire:model="Titulo" :value="old('Titulo')" placeholder="Titulo de la vacantes"/>
        @error('Titulo')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="Salario" :value="__('Salario Mensual')" />
        <select wire:model="Salario" id="Salario" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full block mt-1">
       {{--metodo para rellenar un select--}}
       <option >-- seleccione --</option>
        @foreach ($salarios as $salario )
        <option value="{{$salario->id}}" >{{$salario->salario}}</option>
        @endforeach
        </select>   
        @error('Salario')
        <livewire:mostrar-alerta :message="$message"/>
    @enderror
    </div>
    <div>
        <x-input-label for="Categoria" :value="__('Categoria')" />
        <select wire:model="Categoria" id="Categoria" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full block mt-1">
            {{--metodo para rellenar un select--}}
            <option >-- seleccione --</option>
            @foreach ($categorias as $categoria )
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>   
        @error('Categoria')
        <livewire:mostrar-alerta :message="$message"/>
    @enderror
    </div>
    <div>
        <x-input-label for="Empresa" :value="__('Empresa')" />
        <x-text-input id="Empresa" class="block mt-1 w-full" type="text" wire:model="Empresa" :value="old('Empresa')" placeholder="Empresa ej. Netflix, spotify, Uber"/>   
        @error('Empresa')
        <livewire:mostrar-alerta :message="$message"/>
    @enderror
    </div>
    <div>
        <x-input-label for="fecha" :value="__('Ultimo dia para postularse')" />
        <x-text-input id="fecha" class="block mt-1 w-full" type="date" wire:model="fecha" :value="old('fecha')"/>   
        @error('fecha')
        <livewire:mostrar-alerta :message="$message"/>
    @enderror
    </div>
    <div>
        <x-input-label for="Descripcion" :value="__('Descripción Puesto')" />
        <textarea wire:model="Descripcion" id="Descripcion" cols="30" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full block mt-1" placeholder="Descripcion del puesto General">
        </textarea>      
        @error('Descripcion')
        <livewire:mostrar-alerta :message="$message"/>
    @enderror
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*"/>   
        <div class="my-5 w-70">
            <x-input-label  :value="__('Imagen Actual')" />
         <img src="{{asset('storage/vacantes/' . $imagen) }}" alt="{{'imagen vacante ' . $Titulo}}">
        </div>

         <div class="my-5 w-70">
            @if ($imagen_nueva)
                Imagen nueva:
                <img src="{{ $imagen_nueva->temporaryUrl() }}" alt="">
            @endif
        </div> 

        @error('imagen_nueva')
        <livewire:mostrar-alerta :message="$message"/>
    @enderror
    </div>
    <x-primary-button wire:click='editarvacante'  wire:loading.attr="disabled" class="w-full justify-center">
        Actualizar Publicacion
    </x-primary-button>
</div>