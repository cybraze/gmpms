<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObubData;
use App\Models\ObubState;
use App\Models\ObubDistrict;
use App\Models\ObubMajorSection;
use App\Models\Agency;
use Illuminate\Support\Facades\DB;

class ObubController extends Controller
{
    public function index()
    {
        $rows = ObubData::with(['state','district','majorSection','agency','creator'])
            ->latest('updated_on')
            ->get();

        $states        = ObubState::orderBy('name')->get();
        $districts     = ObubDistrict::orderBy('name')->get(); // front-end pe filter kar lenge
        $majorSections = ObubMajorSection::orderBy('name')->get();
        $agencies      = Agency::orderBy('name')->get();
        $divisions = DB::table('divisions')->orderBy('code')->get(['id','code']);
        // aapka view name:
        return view('ob_ou', compact('rows','states','districts','majorSections','agencies','divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'div_id'            => 'required|string|max:10|exists:divisions,code',
            'lc_no'             => 'nullable|string|max:50',
            'local_name'        => 'nullable|string|max:150',
            'state_id'          => 'required|exists:obub_states,id',
            'dist_id'           => 'required|exists:obub_districts,id',
            'major_section_id'  => 'nullable|exists:obub_major_sections,id',
            'exe_agency_id'     => 'required|exists:agencies,id',
        ]);

        $payload = $request->only([
  'div_id','lc_no','local_name','state_id','dist_id','tvu_date','block_sec_km',
  'major_section_id','exe_agency_id','engg_officer','sanc_details','work_type'
]);

        $payload['created_by'] = auth()->id(); // nullable allowed
        $payload['created_on'] = now();
        $payload['updated_on'] = now();

        $row = ObubData::create($payload);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Record added successfully!',
                'data'    => $row->load(['state','district','majorSection','agency'])
            ]);
        }
        return back()->with('success', 'Record added successfully!');
    }

    public function updateField(Request $request)
{
    $request->validate([
        'id'     => 'required|exists:obub_data,id',
        'fields' => 'required|array',
    ]);

    $row = ObubData::findOrFail($request->id);

    $allowed = [
        'tvu_date','block_sec_km','work_type','gad_app','est_sanct','sanc_cost',
        'award_tender','sanc_cost_sharing','land_acqu','phy_prog','finan_prog',
        'gqgd','pmo','lc_location','target','tdc','tdc_fy','brief_remarks',
        'target_rob','target_rub','completion_date','lc_elim_date'
    ];

    foreach ($request->fields as $field => $value) {
        if (in_array($field, $allowed, true)) {
            if (in_array($field, ['completion_date','lc_elim_date'], true)) {
                $row->{$field} = $value ? date('Y-m-d', strtotime($value)) : null;
            } else {
                $row->{$field} = $value;
            }
        }
    }

    $row->updated_on = now();
    $row->save();

    return response()->json([
        'success' => true,
        'id'      => $row->id,
        'message' => 'Record updated successfully!'
    ]);
}
    // (optional) ajax dependent dropdown if you prefer server-side
    public function districtsByState(Request $request) {
        $request->validate(['state_id' => 'required|exists:obub_states,id']);
        $list = ObubDistrict::where('state_id', $request->state_id)->orderBy('name')->get(['id','name']);
        return response()->json(['success'=>true,'data'=>$list]);
    }

      public function obubHistory($id)
{
    $obubData = \App\Models\ObubData::with(['histories.user'])->findOrFail($id);

    $histories = $obubData->histories()->latest('changed_at')->get();

    // Fetch lookup data
    $states    = \App\Models\ObubState::pluck('name', 'id')->toArray();
    $districts = \App\Models\ObubDistrict::pluck('name', 'id')->toArray();
    $divisions = \App\Models\Division::pluck('code', 'id')->toArray();

    // Decode snapshot JSON + replace IDs with names
    $histories->transform(function ($history) use ($states, $districts, $divisions) {
        $snapshot = json_decode($history->snapshot_json, true);

        if (isset($snapshot['state_id'])) {
            $snapshot['state'] = $states[$snapshot['state_id']] ?? $snapshot['state_id'];
        }
        if (isset($snapshot['dist_id'])) {
            $snapshot['district'] = $districts[$snapshot['dist_id']] ?? $snapshot['dist_id'];
        }
        if (isset($snapshot['div_id'])) {
            $snapshot['division'] = $divisions[$snapshot['div_id']] ?? $snapshot['div_id'];
        }

        $history->snapshot_array = $snapshot;
        return $history;
    });

    $html = view('obub_history', compact('obubData', 'histories'))->render();

    return response()->json(['success' => true, 'html' => $html]);
}

}

