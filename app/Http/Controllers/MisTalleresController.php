<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Taller;

class MisTalleresController extends Controller
{
    public function index()
    {
        // Usar la relación correcta 'talleres' en el modelo User
        $talleres = Auth::user()->talleres ?? collect();
        return view('mis-talleres', compact('talleres'));
    }

    public function eliminar($tallerId)
    {
        $user = Auth::user();
        $user->talleres()->detach($tallerId);
        // Disminuir el cupo_actual del taller
        $taller = \App\Models\Taller::find($tallerId);
        if ($taller && $taller->cupo_actual > 0) {
            $taller->decrement('cupo_actual');
        }
        return redirect()->route('mis-talleres')->with('success', 'Inscripción eliminada correctamente.');
    }
}
