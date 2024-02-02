<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Http\Requests\TypeRequest;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{

    public function validation($data)
    {
        $validated = Validator::make(
            $data,
            [
                "name" => "required|min:5|max:50",
                "description" => "required",
            ],
            [
                'name.required' => 'Il nome è necessario',
                'description.required' => 'La descrizione della tipologia è necessaria'
            ]
        )->validate();

        return $validated;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view("admin.types.index", compact("types"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.types.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        $data = $request->all();
        $dati_validati = $this->validation($data);

        $tipo = new Type();

        $tipo->fill($dati_validati);
        $tipo->save();

        return redirect()->route("admin.types.show", $tipo->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view("admin.types.show", compact("type"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view("admin.types.edit", compact("type"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRequest $request, Type $type)
    {
        $data = $request->all();
        $dati_validati = $this->validation($data);
        $type->update($dati_validati);

        return redirect()->route("admin.types.show", $type->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route("admin.types.index");
    }
}
