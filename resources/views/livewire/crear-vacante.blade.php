<form class="md:w-1/2" action="">
    <div>
        <x-input-label for="Nombre" :value="__('Nombre')" />
        <x-text-input id="Nombre" class="block mt-1 w-full" type="text" name="Nombre" :value="old('Nombre')" required autofocus />
        <x-input-error :messages="$errors->get('Nombre')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
</form>