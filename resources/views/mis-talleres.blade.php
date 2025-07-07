<x-layouts.app :title="__('Mis Talleres')">
    <div class="min-h-screen" style="background: url('/fondodash.png') no-repeat center center fixed; background-size: cover;">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-4">Mis Talleres</h1>
            @if($talleres->isEmpty())
                <div class="mb-2 p-2 bg-blue-100 text-blue-800 rounded">No estás inscrito en ningún taller.</div>
            @else
                <div class="space-y-4">
                    @foreach($talleres as $taller)
                        <div class="p-4 border rounded-xl bg-white dark:bg-zinc-800 flex justify-between items-center">
                            <div>
                                <div class="font-semibold text-lg">{{ $taller->nombre }}</div>
                                <div>{{ $taller->descripcion }}</div>
                                <div class="text-sm text-gray-500">{{ $taller->fecha_inicio }} - {{ $taller->fecha_fin }}</div>
                            </div>
                            <form method="POST" action="{{ route('mis-talleres.eliminar', $taller->id) }}" onsubmit="return confirm('¿Seguro que deseas eliminar tu inscripción a este taller?')">
                                @csrf
                                @method('DELETE')
<<<<<<< HEAD
                                <x-flux-button type="submit" variant="danger">Eliminar</x-flux-button>
=======
                                <x-flux-button type="submit" color="danger">Eliminar</x-flux-button>
>>>>>>> 6e25da2 (eso si)
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
