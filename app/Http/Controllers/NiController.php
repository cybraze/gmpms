<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutoSignalSection;
use App\Models\Division;
use App\Models\NiData;
use App\Models\Station;
use App\Models\Agency;
use App\Models\NiHistory;

class NiController extends Controller
{
    //


     public function ni_data(){


        $ni_data = NiData::with(['division','station','agency','section'])->get();


        // Get all sections of a division
        $division = Division::with('sections')->get();

        $station = Station::get();
        $agency = Agency::get();
        // Get all projects of a section
        $section = AutoSignalSection::with('projects')->get();


        return view('ni_data.index', compact('ni_data','agency','division','section','station'));
    }

    public function Insert(Request $request){

        $request->validate([
        'division_id' => 'required|exists:divisions,id',
        'project_name' => 'required',
        'station_id' => 'required',
        'agency_id' => 'required',
        'section_id' => 'required|exists:auto_signal_section,id',
        'length_of_section' => 'required',
        'proposed_ni_month' => 'required',
        
    ]);


        $project = NiData::create([
            'division_id' => $request->division_id,
            'project_name' => $request->project_name,
            'station_id' => $request->station_id,
            'agency_id' => $request->agency_id,
            'section_id' => $request->section_id,
            'length_of_section_in_km' => $request->length_of_section,
            'proposed_ni_month' => $request->proposed_ni_month,
        ]);
        NiHistory::create([
        'ni_data_id'   => $project->id,
        'snapshot'=> $project->toArray(),
        'changed_by'   => auth()->id(),
        'changed_at'   => now(),
        ]);

        if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Project added successfully!', 'data' => $project]);
        }

        return redirect()->back()->with('success', 'Auto Signal Project added successfully!');


    }
    public function updateField(Request $request){
        $project = NiData::findOrFail($request->id);
        // Loop through only the fields you allow
        $allowed = [
        'for_pre_ni_from','for_pre_ni_to','for_ni_from','for_ni_to','crs_inspection_date','is_commisioned','remarks','esp_status','sip_status','crs_application_status','crs_tdc','crs_sanction_status','month_number',
        'ni_status',
        ];

        foreach ($allowed as $field) {
        if ($request->has($field)) {
        $project->{$field} = $request->$field;
        }
        }

        $project->save();
        NiHistory::create([
        'ni_data_id'   => $project->id,
        'snapshot'=> $project->toArray(),
        'changed_by'   => auth()->id(),
        'changed_at'   => now(),
        ]);


        return response()->json([
        'success' => true,
        'id' => $project->id,
        'message' => 'NI Data updated successfully!'
        ]);

    }
    public function history($id)
{
    $niData = \App\Models\NiData::with(['division', 'section', 'agency', 'histories.user'])
        ->findOrFail($id);

    $histories = $niData->histories()->latest('changed_at')->get();

    // Lookup data
    $divisions = \App\Models\Division::pluck('code', 'id')->toArray();
    $sections  = \App\Models\AutoSignalSection::pluck('name', 'id')->toArray();
    $agencies  = \App\Models\Agency::pluck('name', 'id')->toArray();
    $stations  = \App\Models\Station::pluck('name', 'id')->toArray();

    // Replace IDs with readable names
    $histories->transform(function ($history) use ($divisions, $sections, $agencies, $stations) {
        // snapshot is already an array thanks to $casts in NiHistory
        $snapshot = $history->snapshot;

        if (isset($snapshot['division_id'])) {
            $snapshot['division'] = $divisions[$snapshot['division_id']] ?? $snapshot['division_id'];
        }
        if (isset($snapshot['section_id'])) {
            $snapshot['section'] = $sections[$snapshot['section_id']] ?? $snapshot['section_id'];
        }
        if (isset($snapshot['agency_id'])) {
            $snapshot['agency'] = $agencies[$snapshot['agency_id']] ?? $snapshot['agency_id'];
        }
        if (isset($snapshot['station_id'])) {
            $snapshot['station'] = $stations[$snapshot['station_id']] ?? $snapshot['station_id'];
        }

        $history->snapshot_array = $snapshot; // attach to history for blade
        return $history;
    });

    $html = view('ni_data.history', compact('niData', 'histories'))->render();

    return response()->json(['success' => true, 'html' => $html]);
}
}
