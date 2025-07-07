<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UsuariosAdmin extends Component
{
    public $usuarios;
    public $editId = null;
    public $editRol = '';
    public $editEstado = '';

    public function mount()
    {
        $this->usuarios = User::all();
    }

    public function editar($id)
    {
        $usuario = User::findOrFail($id);
        $this->editId = $id;
        $this->editRol = $usuario->rol;
        $this->editEstado = $usuario->estado;
    }

    public function actualizar()
    {
        $usuario = User::findOrFail($this->editId);
        $usuario->rol = $this->editRol;
        $usuario->estado = $this->editEstado;
        $usuario->save();
        $this->editId = null;
        $this->usuarios = User::all();
        session()->flash('success', 'Usuario actualizado correctamente.');
    }

    public function cancelar()
    {
        $this->editId = null;
    }

    public function render()
    {
        return view('livewire.admin.usuarios-admin', [
            'usuarios' => $this->usuarios,
        ]);
    }
}
