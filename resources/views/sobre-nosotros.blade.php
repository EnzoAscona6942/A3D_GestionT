<x-layouts.app :title="__('Sobre Nosotros')">
    <div class="flex flex-col items-center justify-center min-h-screen bg-white/90 dark:bg-zinc-900/90 p-8">
        <img src="/sobre_nosotros.png" alt="Sobre Nosotros" class="max-w-full h-auto rounded-xl shadow-lg mb-6">
<<<<<<< HEAD
        <x-flux-button type="button" variant="primary" color="violet" onclick="window.history.back()" class="mt-4 px-6 py-2 bg-zinc-800 text-white rounded hover:bg-zinc-600">
    Volver
</x-flux-button>
=======
        <a href="{{ url()->previous() }}" class="mt-4 px-6 py-2 bg-zinc-800 text-white rounded hover:bg-zinc-600">Volver</a>
>>>>>>> 6e25da2 (eso si)
    </div>
</x-layouts.app>
