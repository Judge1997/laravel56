<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Project;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $projects = Project::all();

        return view('categories.create', compact('users','projects'));
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
            'name' => 'required|min:4|max:255|unique:categories,name'
        ]);

        $category = new Category;
        $category->project_id = $request->input('project_id');
        $category->name = $request->input('name');
        $category->assign_to = $request->input('assign_to');
        $category->save();

        return redirect('/categories/' . $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $users = User::all();
        $projects = Project::all();

        return view('categories.edit', compact('category','users','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'name' => 'required|min:4|max:255|unique:categories,name,' . $category->id
        ]);

        $category->project_id = $request->input('project_id');
        $category->name = $request->input('name');
        $category->assign_to = $request->input('assign_to');
        $category->save();

        return redirect('/categories/' . $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect('/categories');
    }
}
