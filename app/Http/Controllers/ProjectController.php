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
    $project = \App\Models\Project::with(['station', 'planHead', 'agency','histories.user'])->findOrFail($id);
    $histories = $project->histories()->latest('changed_at')->get();

    // Fetch all lookup data
    $stations  = \App\Models\Station::pluck('name', 'id')->toArray();
    $planHeads = \App\Models\PlanHead::pluck('code', 'id')->toArray();
    $agencies  = \App\Models\Agency::pluck('name', 'id')->toArray();

    // Replace IDs with names inside snapshot
    $histories->transform(function ($history) use ($stations, $planHeads, $agencies) {
    $snapshot = json_decode($history->snapshot_json, true);

    if (isset($snapshot['station_id'])) {
    $snapshot['station'] = $stations[$snapshot['station_id']] ?? $snapshot['station_id'];
    }
    if (isset($snapshot['ph_id'])) {
    $snapshot['plan_head'] = $planHeads[$snapshot['ph_id']] ?? $snapshot['ph_id'];
    }
    if (isset($snapshot['agency_id'])) {
    $snapshot['agency'] = $agencies[$snapshot['agency_id']] ?? $snapshot['agency_id'];
    }

    $history->snapshot_array = $snapshot; // attach for blade
    return $history;
    });

    $html = view('history', compact('project', 'histories'))->render();

    return response()->json(['success' => true, 'html' => $html]);
    }
    public function updateField(Request $request)
    {
        $project = Project::findOrFail($request->id);

        // Loop through only the fields you allow
        $allowed = [
        'tender_status','esp_status','sip_status',
        'crs_status','building_status',
        'indoor_progress_pct','outdoor_progress_pct','tds_target','is_commisioned'
        ];

        foreach ($allowed as $field) {
        if ($request->has($field)) {
        $project->{$field} = $request->$field;
        }
        }

        $project->save();

        return response()->json([
        'success' => true,
        'id' => $project->id,
        'message' => 'Project updated successfully!'
        ]);
    }

}
