<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Category;
use App\User;
use App\Project;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $issues = Issue::all();
        return view('issues.index', ['issues' => $issues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $status = ['new' => 'New',
                  'feedback' => 'Feedback',
                  'acknowledged' => 'Acknowledged',
                  'confirmed' => 'Confirmed',
                  'resolved' => 'Resolved',
                  'closed' => 'Closed'];

        $priority = ['none' => 'None',
                    'low' => 'Low',
                    'normal' => 'Normal',
                    'high' => 'High',
                    'urgent' => 'Urgent',
                    'immediate' => 'Immediate'];

        $severity = ['feature' => 'Feature',
                    'trivial' => 'Trivial',
                    'text' => 'Text',
                    'tweak' => 'Tweak',
                    'minor' => 'Minor',
                    'major' => 'Major',
                    'crash' => 'Crash',
                    'block' => 'Block'];

        $reproducibility = ['always' => 'Always',
                            'sometimes' => 'Sometimes',
                            'random' => 'Random',
                            'have not tried' => 'Have not tried',
                            'unable to reproduce' => 'Unable to reproduce',
                            'N/A' => 'N/A'];

        $users = User::all();
        $projects = Project::all();
        $categories = Category::all();

        return view('issues.create', compact('users','projects','categories','status','priority','severity','reproducibility'));
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
            'summary' => 'required|min:5|max:255'
        ]);

        $issue = new Issue;
        $issue->project_id = $request->input('project_id');
        $issue->category_id = $request->input('category_id');
        $issue->summary = $request->input('summary');
        $issue->status = $request->input('status');
        $issue->reporter = $request->input('reporter');
        $issue->assigned_to = $request->input('assigned_to');
        $issue->priority = $request->input('priority');
        $issue->severity = $request->input('severity');
        $issue->reproducibility = $request->input('reproducibility');
        $issue->description = $request->input('description');
        $issue->steps = $request->input('steps');
        $issue->save();

        return redirect('/issues/' . $issue->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        //
        return view('issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
        $status = ['new' => 'New',
                  'feedback' => 'Feedback',
                  'acknowledged' => 'Acknowledged',
                  'confirmed' => 'Confirmed',
                  'resolved' => 'Resolved',
                  'closed' => 'Closed'];

        $priority = ['none' => 'None',
                    'low' => 'Low',
                    'normal' => 'Normal',
                    'high' => 'High',
                    'urgent' => 'Urgent',
                    'immediate' => 'Immediate'];

        $severity = ['feature' => 'Feature',
                    'trivial' => 'Trivial',
                    'text' => 'Text',
                    'tweak' => 'Tweak',
                    'minor' => 'Minor',
                    'major' => 'Major',
                    'crash' => 'Crash',
                    'block' => 'Block'];

        $reproducibility = ['always' => 'Always',
                            'sometimes' => 'Sometimes',
                            'random' => 'Random',
                            'have not tried' => 'Have not tried',
                            'unable to reproduce' => 'Unable to reproduce',
                            'N/A' => 'N/A'];

        $users = User::all();
        $projects = Project::all();
        $categories = Category::all();

        return view('issues.edit', compact('issue','users','projects','categories','status','priority','severity','reproducibility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
        $request->validate([
            'summary' => 'required|min:5|max:255'
        ]);

        $issue->project_id = $request->input('project_id');
        $issue->category_id = $request->input('category_id');
        $issue->summary = $request->input('summary');
        $issue->status = $request->input('status');
        $issue->reporter = $request->input('reporter');
        $issue->assigned_to = $request->input('assigned_to');
        $issue->priority = $request->input('priority');
        $issue->severity = $request->input('severity');
        $issue->reproducibility = $request->input('reproducibility');
        $issue->description = $request->input('description');
        $issue->steps = $request->input('steps');
        $issue->save();

        return redirect('/issues/' . $issue->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
        $issue->delete();
        return redirect('/issues');
    }
}
