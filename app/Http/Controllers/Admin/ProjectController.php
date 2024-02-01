<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function validation($data)
    {
        $validated = Validator::make(
            $data,
            [
                "title" => "required|min:5|max:50",
                "description" => "",
                "image" => "max:200",
                "topic" => "required"
            ],
            [
                'title.required' => 'Il titolo è necessario',
                'topic.required' => 'Il nome della serie è necessario'
            ]
        )->validate();

        return $validated;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $dati_validati = $this->validation($data);

        $progetto = new Project();

        $progetto->fill($dati_validati);
        $progetto->save();

        return redirect()->route("admin.projects.show", $progetto->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view("admin.projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $dati_validati = $this->validation($data);
        $project->update($dati_validati);

        return redirect()->route("admin.projects.show", $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route("admin.projects.index");
    }
}
