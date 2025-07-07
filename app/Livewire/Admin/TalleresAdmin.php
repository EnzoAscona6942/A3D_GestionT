<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Taller;

class TalleresAdmin extends Component
{
    public $nombre;
    public $descripcion;
    public $fecha_inicio;
    public $fecha_fin;
    public $hora_inicio;
    public $hora_fin;
    public $cupo_maximo;
    public $imagen;
    public $taller_id;
    public $editMode = false;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        'hora_inicio' => 'required',
        'hora_fin' => 'required',
        'cupo_maximo' => 'required|integer|min:1',
        'imagen' => 'nullable|string',
    ];

    public function crearTaller()
    {
        $this->validate();
        Taller::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'cupo_maximo' => $this->cupo_maximo,
            'imagen' => $this->imagen,
        ]);
        $this->resetForm();
        session()->flash('success', 'Taller creado correctamente.');
    }

    public function editarTaller($id)
    {
        $taller = Taller::findOrFail($id);
        $this->taller_id = $taller->id;
        $this->nombre = $taller->nombre;
        $this->descripcion = $taller->descripcion;
        $this->fecha_inicio = $taller->fecha_inicio;
        $this->fecha_fin = $taller->fecha_fin;
        $this->hora_inicio = $taller->hora_inicio;
        $this->hora_fin = $taller->hora_fin;
        $this->cupo_maximo = $taller->cupo_maximo;
        $this->imagen = $taller->imagen;
        $this->editMode = true;
    }

    public function actualizarTaller()
    {
        $this->validate();
        $taller = Taller::findOrFail($this->taller_id);
        $taller->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'cupo_maximo' => $this->cupo_maximo,
            'imagen' => $this->imagen,
        ]);
        $this->resetForm();
        session()->flash('success', 'Taller actualizado correctamente.');
    }

    public function eliminarTaller($id)
    {
        Taller::destroy($id);
        session()->flash('success', 'Taller eliminado correctamente.');
    }

    public function cancelarEdicion()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['nombre','descripcion','fecha_inicio','fecha_fin','hora_inicio','hora_fin','cupo_maximo','imagen','taller_id','editMode']);
    }

    public function render()
    {
        $talleres = Taller::latest()->get();
        return view('livewire.admin.talleres-admin', compact('talleres'));
    }
}
