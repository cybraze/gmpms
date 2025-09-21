<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Station;
use App\Models\PlanHead;
use App\Models\Agency;
use App\Models\ProjectHistory;
class ProjectController extends Controller
{
    //

    public function project_view(){


        $projects = Project::with(['station', 'planHead', 'agency','histories.user'])->get();
        $station = Station::get();
        $planhead = PlanHead::get();
        $agency = Agency::get();
        return view('ei_works', compact('projects','station','planhead','agency'));
    }
    public function projectInsert(Request $request)
    {
        $request->validate([
        'station_id' => 'required|exists:stations,id',
        'ph_id' => 'required|exists:plan_heads,id',
        'work_type' => 'required|string|max:255',
        'agency_id' => 'required|exists:agencies,id',
        'tds' => 'nullable|date',
        ]);

        $project = Project::create([
            'station_id' => $request->station_id,
            'ph_id' => $request->ph_id,
            'work_type' => $request->work_type,
            'agency_id' => $request->agency_id,
            'tds_target' => $request->tds,  // assuming column is tds_target
            'created_by' => auth()->id(),
        ]);
       /* ProjectHistory::create([
        'project_id'   => $project->id,
        'snapshot_json'=> json_encode($project->toArray()),
        'changed_by'   => auth()->id(),
        'changed_at'   => now(),
        ]);*/

        if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Project added successfully!', 'data' => $project]);
        }

        return redirect()->back()->with('success', 'Project added successfully!');
    }
    public function history($id)
    {
    $project = \App\Models\Project::with(['histories.user'])->findOrFail($id);
    $histories = $project->histories()->latest('changed_at')->get();

    // Return rendered partial HTML for modal body
    $html = view('history', compact('project', 'histories'))->render();

    return response()->json(['success' => true, 'html' => $html]);
    }
        public function updateField(Request $request)
        {
        $request->validate([
        'id'    => 'required|exists:projects,id',
        'field' => 'required|string',
        'value' => 'nullable'
        ]);

        $project = \App\Models\Project::findOrFail($request->id);

        // update field dynamically
        $project->{$request->field} = $request->value;
        $project->save();

        // optional: log to history
/*        \App\Models\ProjectHistory::create([
        'project_id'   => $project->id,
        'snapshot_json'=> json_encode($project->toArray()),
        'changed_by'   => auth()->id(),
        'changed_at'   => now(),
        ]);*/

        return response()->json([
        'success' => true,
        'id'      => $project->id, // 👈 send back row id
        'message' => ucfirst(str_replace('_', ' ', $request->field)) . ' updated successfully!'
        ]);
        }
}
