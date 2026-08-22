<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateAprendizRequest;

class AprendizController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $aprendices = Aprendiz::query()
            ->when($q, function ($query) use ($q) {
                $query->where('nombre', 'like', "%{$q}%")
                    ->orWhere('documento', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        return view('aprendices.index', compact('aprendices', 'q'));
    }
    public function create()
    {
        $aprendiz = new Aprendiz();
        return view('aprendices.create', compact('aprendiz'));
    }
    public function store(StoreUpdateAprendizRequest $request)
    {
        Aprendiz::create($request->validated());
        return redirect()->route('aprendices.index')->with('ok', 'Aprendiz creado');
    }
    public function edit(Aprendiz $aprendiz)
    {
        return view('aprendices.edit', compact('aprendiz'));
    }
    public function update(StoreUpdateAprendizRequest $request, Aprendiz $aprendiz)
    {
        $aprendiz->update($request->validated());
        return redirect()->route('aprendices.index')->with('ok', 'Aprendiz actualizado');
    }
    public function destroy(Aprendiz $aprendiz)
    {
        $aprendiz->delete();
        return redirect()->route('aprendices.index')->with('ok', 'Aprendiz eliminado');
    }
}
