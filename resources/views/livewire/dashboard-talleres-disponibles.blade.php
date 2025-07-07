<div class="min-h-screen" style="background: url('/fondodash.png') no-repeat center center fixed; background-size: cover;">
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Talleres Disponibles</h2>
        @if(session('success'))
            <div class="mb-2 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-2 p-2 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
        @endif
        <div class="space-y-4">
            @forelse($talleresDisponibles as $taller)
                <div class="p-4 border rounded-xl bg-white dark:bg-zinc-800 flex justify-between items-center">
                    <div>
                        <div class="font-semibold text-lg">{{ $taller->nombre }}</div>
                        <div>{{ $taller->descripcion }}</div>
                        <div class="text-sm text-gray-500">{{ $taller->fecha_inicio }} - {{ $taller->fecha_fin }}</div>
                        <div class="text-sm">Cupo: {{ $taller->cupo_actual ?? 0 }} / {{ $taller->cupo_maximo }}</div>
                    </div>
                    <div>
                        @if(in_array($taller->id, $inscripciones))
                            <span class="text-green-600 font-semibold">Inscripto</span>
                        @else
                            <x-flux-button wire:click="inscribirse({{ $taller->id }})" variant="primary" color="violet">Inscribirse</x-flux-button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="mb-2 p-2 bg-blue-100 text-blue-800 rounded">No hay talleres disponibles con cupo.</div>
            @endforelse
        </div>
    </div>
</div>
