<div class="min-h-screen" style="background: url('/fondodash.png') no-repeat center center fixed; background-size: cover;">
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Gestión de Usuarios</h1>
        @if(session('success'))
            <div class="mb-4 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-zinc-800 rounded shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Rol</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td class="px-4 py-2">{{ $usuario->name }}</td>
                            <td class="px-4 py-2">{{ $usuario->email }}</td>
                            <td class="px-4 py-2">
                                @if($editId === $usuario->id)
                                    <x-flux-select wire:model.defer="editRol">
                                        <option value="admin">Admin</option>
                                        <option value="instructor">Instructor</option>
                                        <option value="estudiante">Estudiante</option>
                                    </x-flux-select>
                                @else
                                    {{ ucfirst($usuario->rol) }}
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                @if($editId === $usuario->id)
                                    <x-flux-select wire:model.defer="editEstado">
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </x-flux-select>
                                @else
                                    {{ ucfirst($usuario->estado) }}
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                @if($editId === $usuario->id)
                                    <x-flux-button wire:click="actualizar" color="primary">Guardar</x-flux-button>
                                    <x-flux-button wire:click="cancelar" color="neutral">Cancelar</x-flux-button>
                                @else
                                    <x-flux-button wire:click="editar({{ $usuario->id }})" color="warning">Editar</x-flux-button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
