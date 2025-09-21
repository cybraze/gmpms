<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\AutoSignalSection;
use App\Models\ProjectAutoSignaling;
class AutoSignalController extends Controller
{
    //
    public function auto_signal_project(){


        $projects = ProjectAutoSignaling::with(['division', 'section'])->get();

        // Get all sections of a division
        $division = Division::with('sections')->get();

        // Get all projects of a section
        $section = AutoSignalSection::with('projects')->get();

        return view('auto_signal.index', compact('projects','division','section'));
    }
    public function Insert(Request $request){
      
        $request->validate([
        'division_id' => 'required|exists:divisions,id',
        'section_id' => 'required|exists:auto_signal_section,id',
        'target_year' => 'required',

        ]);


        $project = ProjectAutoSignaling::create([
            'division_id' => $request->division_id,
            'section_id' => $request->section_id,
            'target_year' => $request->target_year,
       /*     'agency_id' => $request->agency_id,
            'tds_target' => $request->tds,
            'created_by' => auth()->id(),*/
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

        return redirect()->back()->with('success', 'Auto Signal Project added successfully!');


    }
    public function updateField(Request $request){
        $project = ProjectAutoSignaling::findOrFail($request->id);
        // Loop through only the fields you allow
        $allowed = [
        'tender_status','target_rkm','completed_rkm','balance_rkm','esp_status','sip_status','rcc_status',
        'swr_status','interface_status','app_logic_status','fat_status','sat_status','gm_sanction_status','tdc_target',
        'indoor_progress_pct','outdoor_progress_pct','tds_target'
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
   public function history($id)
{
    $project = \App\Models\ProjectAutoSignaling::with(['division', 'section', 'histories.user'])
        ->findOrFail($id);

    $histories = $project->histories()->latest('changed_at')->get();

    // Fetch lookup data
    $divisions = \App\Models\Division::pluck('code', 'id')->toArray();
    $sections  = \App\Models\AutoSignalSection::pluck('name', 'id')->toArray();

    // Replace IDs with names in snapshot
    $histories->transform(function ($history) use ($divisions, $sections) {
        $snapshot = json_decode($history->snapshot_json, true);

        if (isset($snapshot['division_id'])) {
            $snapshot['division'] = $divisions[$snapshot['division_id']] ?? $snapshot['division_id'];
        }
        if (isset($snapshot['section_id'])) {
            $snapshot['section'] = $sections[$snapshot['section_id']] ?? $snapshot['section_id'];
        }

        $history->snapshot_array = $snapshot; // attach for blade
        return $history;
    });

    $html = view('auto_signal.history', compact('project', 'histories'))->render();

    return response()->json(['success' => true, 'html' => $html]);
}
}
