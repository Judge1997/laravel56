<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $view_status = ['public' => 'Public', 'private' => 'Private'];
        $status = ['development' => 'Development',
        'release' => 'Release',
        'stable' => 'Stable',
        'obsolete' => 'Obsolete'];
        return view('projects.create', compact('view_status','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:4|max:255|unique:projects,name',
            'description' => 'required|min:10',
            'view_status' => 'required'
        ]);

        $project = new Project;
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->view_status = $request->input('view_status');
        $project->status = $request->input('status');
        $project->save();
        // return redirect('/projects');
        return redirect('/projects/' . $project->id);
        // return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $view_status = ['public' => 'Public', 'private' => 'Private'];
        $status = ['development' => 'Development',
        'release' => 'Release',
        'stable' => 'Stable',
        'obsolete' => 'Obsolete'];
        return view('projects.edit', compact('project','view_status','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $request->validate([
            'name' => 'required|min:4|max:255|unique:projects,name,' . $project->id,
            'description' => 'required|min:10',
            'view_status' => 'required'
        ]);

        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->view_status = $request->input('view_status');
        $project->status = $request->input('status');
        $project->save();
        return redirect('/projects/' . $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect('/projects');
    }
}
