<div class="min-h-screen" style="background: url('/fondodash.png') no-repeat center center fixed; background-size: cover;">
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Gestión de Talleres</h1>

        @if (session()->has('success'))
            <div class="mb-4 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        <form wire:submit.prevent="{{ $editMode ? 'actualizarTaller' : 'crearTaller' }}" class="space-y-4 mb-8">
            <x-flux-input label="Nombre" wire:model.defer="nombre" />
            @error('nombre') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror

            <x-flux-input label="Descripción" wire:model.defer="descripcion" textarea />
            @error('descripcion') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror

            <div class="flex gap-2">
                <div class="flex-1">
                    <x-flux-input label="Fecha inicio" type="date" wire:model.defer="fecha_inicio" />
                    @error('fecha_inicio') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex-1">
                    <x-flux-input label="Fecha fin" type="date" wire:model.defer="fecha_fin" />
                    @error('fecha_fin') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex gap-2">
                <div class="flex-1">
                    <x-flux-input label="Hora inicio" type="time" wire:model.defer="hora_inicio" />
                    @error('hora_inicio') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex-1">
                    <x-flux-input label="Hora fin" type="time" wire:model.defer="hora_fin" />
                    @error('hora_fin') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex gap-2">
                <div class="flex-1">
                    <x-flux-input label="Cupo máximo" type="number" min="1" wire:model.defer="cupo_maximo" />
                    @error('cupo_maximo') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex-1">
                    <x-flux-input label="Imagen (URL)" wire:model.defer="imagen" />
                    @error('imagen') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex gap-2">
                <x-flux-button type="submit" color="primary">
                    {{ $editMode ? 'Actualizar Taller' : 'Crear Taller' }}
                </x-flux-button>
                @if($editMode)
                    <x-flux-button type="button" color="neutral" wire:click="cancelarEdicion">Cancelar</x-flux-button>
                @endif
            </div>
        </form>

        <h2 class="text-xl font-semibold mb-2">Lista de Talleres</h2>
        <div class="space-y-2">
            @forelse($talleres as $taller)
                <div class="p-4 border rounded bg-white dark:bg-zinc-800 flex justify-between items-center">
                    <div>
                        <div class="font-bold">{{ $taller->nombre }}</div>
                        <div>{{ $taller->descripcion }}</div>
                        <div class="text-sm text-gray-500">{{ $taller->fecha_inicio }} - {{ $taller->fecha_fin }}</div>
                        <div class="text-sm">Cupo: {{ $taller->cupo_actual ?? 0 }} / {{ $taller->cupo_maximo }}</div>
                    </div>
                    <div class="flex gap-2">
                        <x-flux-button color="warning" wire:click="editarTaller({{ $taller->id }})">Editar</x-flux-button>
                        <x-flux-button color="danger" wire:click="eliminarTaller({{ $taller->id }})" onclick="return confirm('¿Seguro que deseas eliminar este taller?')">Eliminar</x-flux-button>
                    </div>
                </div>
            @empty
                <div>No hay talleres registrados.</div>
            @endforelse
        </div>
    </div>
</div>
