<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectType;
use App\Models\ProjectSheet;
use App\Models\NewProject;
use App\Models\SheetObject;
use App\Models\MasterObjectItem;
use App\Models\PreparatoryScope;
use App\Models\PreparatoryItemHistory;
use App\Models\MasterKavachSection;
use App\Models\GkSectionData;
use App\Models\TowerSectionData;
use App\Models\OfcSectionData;
use App\Models\SectionLocoKavach;
use App\Models\LocoShedHoldingMaster;
use App\Models\StaffMaster;
use App\Models\DepartmentMaster;
use App\Models\KavachTrainingSection;
use App\Models\GkSectionHistory;
use App\Models\TowerSectionHistory;
use App\Models\OfcSectionHistory;
use App\Models\LocoKavachSectionHistory;
use App\Models\KavachTrainingSectionHistory;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectAutoSignaling;
use App\Models\MasterKavachItem;
use App\Models\KavachTenderData;
use App\Models\KavachTenderHistory;
class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'username' => 'Invalid username or password',
        ]);
    }

    public function kavach_works_dashboard(){

        return view('kavach_works_dashboard');
    }
    public function ei_works_dashboard(){
        return view('ei_works_dashboard');
    }
    public function auto_signaling_dashboard(){
        return view('auto_signaling_dashboard');
    }
    public function rob_rub_dashboard(){
        return view('rob_rub_dashboard');
    }

    public function home()
    {
        $totalTargetRkm = ProjectAutoSignaling::where('target_year', '2025-26')
            ->sum('target_rkm');
            
        // Total RKM where FAT Completed (fat_status = 1)
        $totalFatCompletedRkm = ProjectAutoSignaling::where('target_year', '2025-26')
            ->where('fat_status', 1)
            ->sum('target_rkm');
        $totalSatCompletedRkm = ProjectAutoSignaling::where('target_year', '2025-26')
            ->where('sat_status', 1)
            ->sum('target_rkm');
        
        
        return view('home', compact('totalTargetRkm','totalFatCompletedRkm','totalSatCompletedRkm'));
    }

 public function create_new_project()
{
      $projects = NewProject::all();

    return view('create_new_project', compact('projects'));
}





public function store_new_project(Request $request)
    {
        // ✅ Validation
        $request->validate([
            
            'project_name' => 'required|string|max:255',
        ]);

        // ✅ Insert data
        NewProject::create([
           
            'project_name'    => $request->project_name,
        ]);

        // ✅ Redirect back with success
        return redirect()->back()->with('success', 'Project created successfully!');
    }



        public function show_sheets($id)
{
    $project = NewProject::findOrFail($id);

    return view('project_sheets', compact('project'));
}



public function object_details($id)
{
    // Objects + unke items
    $objects = SheetObject::all();

    $data = [];
    $allItemIds = [];

    foreach ($objects as $object) {
        $items = MasterObjectItem::where('object_id', $object->id)->get();

        $data[] = [
            'object_name' => $object->object_name,
            'items'       => $items,
        ];

        // later mapping ke liye item ids collect
        foreach ($items as $it) {
            $allItemIds[] = $it->id;
        }
    }

    // Is project ke pehle se saved rows (keyed by item_id)
    $existing = PreparatoryScope::where('new_project_id', $id)
                ->whereIn('item_id', $allItemIds)
                ->get()
                ->keyBy('item_id');

    // Requirement: pehli submit ke baad pura form lock
    $isLocked = $existing->isNotEmpty();

    return view('object_details', compact('data', 'id', 'existing', 'isLocked'));
}







public function section_target_details($id)
{

    $sections = MasterKavachSection::all();

    $data = GkSectionData::with('section')
            ->where('new_project_id', $id)
            ->get();

$towerdata = TowerSectionData::with('section')
            ->where('new_project_id', $id)
            ->get();

$ofcdata = OfcSectionData::with('section')
            ->where('new_project_id', $id)
            ->get();

// 👇 Map of section_id => section_name
    $sectionsMap = MasterKavachSection::pluck('section_name', 'id')->toArray();

    return view('section_target_details', compact('sections','data','id','towerdata','ofcdata','sectionsMap'));
}

public function getSectionHistory($id)
{
    $history = \App\Models\GkSectionHistory::with(['section', 'user'])
                ->where('gk_section_id', $id)
                ->orderBy('id', 'desc')
                ->get()
                ->map(function ($item) {
                    return [
                        'id'            => $item->id,
                        'changed_by'    => $item->user ? $item->user->name : 'System',
                        'changed_at'    => $item->changed_at,
                        'snapshot_json' => $item->snapshot_json,
                        'section_name'  => $item->section ? $item->section->section_name : null,
                    ];
                });

    return response()->json($history);
}






  public function gk_section_store(Request $request)
{
    $request->validate([
        'new_project_id'  => 'required|integer',
        'section_id'      => 'required|integer',
        'rkm'             => 'required|integer',
        'rfid_scope'      => 'required|integer',
        'se_stn_scope'    => 'required|integer',
        'se_hut_scope'    => 'required|integer',
        'fat_stn_scope'   => 'required|integer',
        'fat_hut_scope'   => 'required|integer',
        'sat_stn_scope'   => 'required|integer',
        'sat_hut_scope'   => 'required|integer',
        'idd_stn_scope'   => 'required|integer',
        'idd_hut_scope'   => 'required|integer',
    ]);

    $section = GkSectionData::create([
        'new_project_id'  => $request->new_project_id,
        'section_id'      => $request->section_id,
        'rkm'             => $request->rkm,

        'rfid_scope'      => $request->rfid_scope,
        'rfid_comp'       => 0,
        'se_stn_scope'    => $request->se_stn_scope,
        'se_stn_comp'     => 0,
        'se_hut_scope'    => $request->se_hut_scope,
        'se_hut_comp'     => 0,
        'fat_stn_scope'   => $request->fat_stn_scope,
        'fat_stn_comp'    => 0,
        'fat_hut_scope'   => $request->fat_hut_scope,
        'fat_hut_comp'    => 0,
        'sat_stn_scope'   => $request->sat_stn_scope,
        'sat_stn_comp'    => 0,
        'sat_hut_scope'   => $request->sat_hut_scope,
        'sat_hut_comp'    => 0,
        'idd_stn_scope'   => $request->idd_stn_scope,
        'idd_stn_comp'    => 0,
        'idd_hut_scope'   => $request->idd_hut_scope,
        'idd_hut_comp'    => 0,
    ]);

   GkSectionHistory::create([
    'gk_section_id' => $section->id,
    'new_project_id'=> $section->new_project_id,
    'section_id'    => $section->section_id, // 👈 add this
    'snapshot_json' => json_encode($section->toArray()),
    'changed_by'    => auth()->id(),
    'changed_at'    => now(),
]);


    return redirect()->back()->with('success', 'Section Data Saved Successfully!');
}






public function tower_section_store(Request $request)
{
    $request->validate([
        'new_project_id'  => 'required|integer',
        'section_id'      => 'required|integer',
        'rkm'             => 'required|integer',
        'tower_foundation_stn_scope' => 'required|integer',
        'tower_erection_stn_scope'   => 'required|integer',
        'tower_foundation_scope'     => 'required|integer',
        'tower_erection_scope'       => 'required|integer',
    ]);

    $section = TowerSectionData::create([
        'new_project_id'  => $request->new_project_id,
        'section_id'      => $request->section_id,
        'rkm'             => $request->rkm,

        'tower_foundation_stn_scope' => $request->tower_foundation_stn_scope,
        'tower_foundation_stn_comp'  => 0,

        'tower_erection_stn_scope'   => $request->tower_erection_stn_scope,
        'tower_erection_stn_comp'    => 0,

        'tower_foundation_scope'     => $request->tower_foundation_scope,
        'tower_foundation_comp'      => 0,

        'tower_erection_scope'       => $request->tower_erection_scope,
        'tower_erection_comp'        => 0,
    ]);

    // 👇 Save history
    TowerSectionHistory::create([
        'tower_section_id' => $section->id,
        'new_project_id'   => $section->new_project_id,
        'section_id'       => $section->section_id,
        'snapshot_json'    => json_encode($section->toArray()),
        'changed_by'       => auth()->id(),
        'changed_at'       => now(),
    ]);

    return redirect()->back()->with('success', 'Tower Section Data Saved Successfully!');
}





public function update_section_gk(Request $request, $id)
{
    $section = GkSectionData::findOrFail($id);

    $section->update([
        'rfid_comp'     => $request->rfid_comp,
        'se_stn_comp'   => $request->se_stn_comp,
        'se_hut_comp'   => $request->se_hut_comp,
        'fat_stn_comp'  => $request->fat_stn_comp,
        'fat_hut_comp'  => $request->fat_hut_comp,
        'sat_stn_comp'  => $request->sat_stn_comp,
        'sat_hut_comp'  => $request->sat_hut_comp,
        'idd_stn_comp'  => $request->idd_stn_comp,
        'idd_hut_comp'  => $request->idd_hut_comp,
    ]);

    // Save history snapshot
   GkSectionHistory::create([
    'gk_section_id' => $section->id,
    'new_project_id'=> $section->new_project_id,
    'section_id'    => $section->section_id, // 👈 add this
    'snapshot_json' => json_encode($section->toArray()),
    'changed_by'    => auth()->id(),
    'changed_at'    => now(),
]);


    return redirect()->back()->with('success', 'Data updated successfully!');
}







public function tower_update_section(Request $request, $id)
{
    $section = TowerSectionData::findOrFail($id);

    $section->update([
        'tower_foundation_stn_comp' => $request->tower_foundation_stn_comp,
        'tower_erection_stn_comp'   => $request->tower_erection_stn_comp,
        'tower_foundation_comp'     => $request->tower_foundation_comp,
        'tower_erection_comp'       => $request->tower_erection_comp,
    ]);

    // 👇 Save history
    TowerSectionHistory::create([
        'tower_section_id' => $section->id,
        'new_project_id'   => $section->new_project_id,
        'section_id'       => $section->section_id,
        'snapshot_json'    => json_encode($section->fresh()->toArray()),
        'changed_by'       => auth()->id(),
        'changed_at'       => now(),
    ]);

    return redirect()->back()->with('success', 'Tower Data updated successfully!');
}


public function getTowerSectionHistory($id)
{
    $history = \App\Models\TowerSectionHistory::with(['section', 'user'])
                ->where('tower_section_id', $id)
                ->orderBy('id', 'desc')
                ->get()
                ->map(function ($item) {
                    return [
                        'id'            => $item->id,
                        'changed_by'    => $item->user ? $item->user->name : 'System',
                        'changed_at'    => $item->changed_at,
                        'snapshot_json' => $item->snapshot_json,
                        'section_name'  => $item->section ? $item->section->section_name : null,
                    ];
                });

    return response()->json($history);
}







public function ofc_section_store(Request $request)
{
    $request->validate([
        'new_project_id'  => 'required|integer',
        'section_id'      => 'required|integer',
        'rkm'             => 'required|integer',
        'ofc_duct_scope'  => 'required|integer',
        'ofc_lay_scope'   => 'required|integer',
        'outdoor_design_scope' => 'required|integer',
    ]);

    $section = OfcSectionData::create([
        'new_project_id'  => $request->new_project_id,
        'section_id'      => $request->section_id,
        'rkm'             => $request->rkm,

        'ofc_duct_scope'  => $request->ofc_duct_scope,
        'ofc_duct_comp'   => 0,

        'ofc_lay_scope'   => $request->ofc_lay_scope,
        'ofc_lay_comp'    => 0,

        'outdoor_design_scope' => $request->outdoor_design_scope,
        'outdoor_design_comp'  => 0,
    ]);

    // 👇 Save History
    OfcSectionHistory::create([
        'ofc_section_id' => $section->id,
        'new_project_id' => $section->new_project_id,
        'section_id'     => $section->section_id,
        'snapshot_json'  => json_encode($section->toArray()),
        'changed_by'     => auth()->id(),
        'changed_at'     => now(),
    ]);

    return redirect()->back()->with('success', 'OFC Section Data Saved Successfully!');
}



public function ofc_update_section(Request $request, $id)
{
    $section = OfcSectionData::findOrFail($id);

    $section->update([
        'ofc_duct_comp'        => $request->ofc_duct_comp,
        'ofc_lay_comp'         => $request->ofc_lay_comp,
        'outdoor_design_comp'  => $request->outdoor_design_comp,
    ]);

    // 👇 Save History
    OfcSectionHistory::create([
        'ofc_section_id' => $section->id,
        'new_project_id' => $section->new_project_id,
        'section_id'     => $section->section_id,
        'snapshot_json'  => json_encode($section->fresh()->toArray()),
        'changed_by'     => auth()->id(),
        'changed_at'     => now(),
    ]);

    return redirect()->back()->with('success', 'OFC Data updated successfully!');
}


public function getOfcSectionHistory($id)
{
    $history = \App\Models\OfcSectionHistory::with(['section', 'user'])
        ->where('ofc_section_id', $id)
        ->orderBy('id', 'desc')
        ->get()
        ->map(function ($item) {
            return [
                'id'            => $item->id,
                'changed_by'    => $item->user ? $item->user->name : 'System',
                'changed_at'    => $item->changed_at,
                'snapshot_json' => $item->snapshot_json,
                'section_name'  => $item->section ? $item->section->section_name : null,
            ];
        });

    return response()->json($history);
}








public function loco_kavach_details($id)
{
    // master table ka data
    $sections = LocoShedHoldingMaster::all();

    // relation ke sath kavach data
    $locodata = SectionLocoKavach::with(['shed'])
                ->where('new_project_id', $id)
                ->get();
    return view('loco_kavach_details', compact('sections','locodata','id'));
}
public function tender_status_details($id){

    $tenderData = KavachTenderData::with(['item', 'section', 'project'])->get();
    $sections = MasterKavachSection::all();
    $item = MasterKavachItem::all();

    return view('kavach_tender.index', compact('tenderData','sections','item','id'));

}
public function kavach_tender_status_store(Request $request){
     $request->validate([
        'item_id' => 'required|exists:divisions,id',
        'project_id' => 'required|exists:auto_signal_section,id',
        'section_id' => 'required',
        'tender_status' => 'required',

        ]);


        $kavach_tender = KavachTenderData::create([
            'kavach_item_id' => $request->item_id,
            'kavach_section_id' => $request->section_id,
            'new_project_id' => $request->project_id,
            'tender_status' => $request->tender_status,
 
        ]);
       KavachTenderHistory::create([
        'kavach_tender_id'   => $kavach_tender->id,
        'snapshot_json'=> json_encode($kavach_tender->toArray()),
        'changed_by'   => auth()->id(),
        'changed_at'   => now(),
        ]);

        if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Tender Status added successfully!', 'data' => $kavach_tender]);
        }

        return redirect()->back()->with('success', 'Auto Signal Project added successfully!');
}

public function kavach_tender_status_update(Request $request){

    $project = KavachTenderData::findOrFail($request->id);
    // Loop through only the fields you allow
    $allowed = [
        'nit_date',
        'tender_opening_date',
        'loa_date',
        'remarks',
        'updated_on',
    ];

    foreach ($allowed as $field) {
        if ($request->has($field)) {
            $project->{$field} = $request->$field;
        }
    }

    $project->save();

    KavachTenderHistory::create([
    'kavach_tender_id'   =>$project->id,
    'snapshot_json'=> json_encode($project->toArray()),
    'changed_by'   => auth()->id(),
    'changed_at'   => now(),
    ]);

    return response()->json([
    'success' => true,
    'id' => $project->id,
    'message' => 'Tender Status updated successfully!'
    ]);



}

public function tender_history($id)
{
    // Get tender data with relationships
    $tenderData = KavachTenderData::with(['item', 'section', 'project'])->findOrFail($id);

    // Fetch related histories
    $histories = $tenderData->histories()->latest('changed_at')->get();

    // Lookup data
    $sections = MasterKavachSection::pluck('section_name', 'id')->toArray();
    $items    = MasterKavachItem::pluck('name', 'id')->toArray();
    $projects = NewProject::pluck('project_name', 'id')->toArray();

    // Replace IDs with names in snapshot
    $histories->transform(function ($history) use ($sections, $items, $projects) {
        $snapshot = json_decode($history->snapshot_json, true);

        if (isset($snapshot['kavach_section_id'])) {
            $snapshot['section'] = $sections[$snapshot['kavach_section_id']] ?? $snapshot['kavach_section_id'];
        }
        if (isset($snapshot['kavach_item_id'])) {
            $snapshot['item'] = $items[$snapshot['kavach_item_id']] ?? $snapshot['kavach_item_id'];
        }
        if (isset($snapshot['new_project_id'])) {
            $snapshot['project'] = $projects[$snapshot['new_project_id']] ?? $snapshot['new_project_id'];
        }

        $history->snapshot_array = $snapshot; // attach for blade
        return $history;
    });

    // Render HTML
    $html = view('kavach_tender.history', compact('tenderData', 'histories'))->render();

    return response()->json(['success' => true, 'html' => $html]);
}


public function locokavach_section_store(Request $request)
{
    $request->validate([
        'new_project_id'   => 'required|integer',
        'loco_shed_id'     => 'required|integer',
        'allotment_kernex' => 'required|integer',
        'allotment_medha'  => 'required|integer',
    ]);

    $section = SectionLocoKavach::create([
        'new_project_id'   => $request->new_project_id,
        'loco_shed_id'     => $request->loco_shed_id,
        'allotment_kernex' => $request->allotment_kernex,
        'allotment_medha'  => $request->allotment_medha,

        'fitted_kernex'    => 0,
        'fitted_medha'     => 0,
        'remarks'          => $request->remarks ?? null,
    ]);

    // 🔥 Save History
    LocoKavachSectionHistory::create([
        'loco_section_id' => $section->id,
        'new_project_id'  => $section->new_project_id,
        'loco_shed_id'    => $section->loco_shed_id,
        'snapshot_json'   => json_encode($section->toArray()),
        'changed_by'      => auth()->id(),
        'changed_at'      => now(),
    ]);

    return redirect()->back()->with('success', 'Loco KAVACH Section Data Saved Successfully!');
}


public function locokavach_update_section(Request $request, $id)
{
    $section = SectionLocoKavach::findOrFail($id);

    $section->update([
        'fitted_kernex' => $request->fitted_kernex,
        'fitted_medha'  => $request->fitted_medha,
        'remarks'       => $request->remarks,
    ]);

    // 🔥 Save History
    LocoKavachSectionHistory::create([
        'loco_section_id' => $section->id,
        'new_project_id'  => $section->new_project_id,
        'loco_shed_id'    => $section->loco_shed_id,
        'snapshot_json'   => json_encode($section->fresh()->toArray()),
        'changed_by'      => auth()->id(),
        'changed_at'      => now(),
    ]);

    return redirect()->back()->with('success', 'Loco KAVACH Section Data updated successfully!');
}

public function getLocoKavachHistory($id)
{
    $history = \App\Models\LocoKavachSectionHistory::with(['shed', 'user'])
        ->where('loco_section_id', $id)
        ->orderBy('id', 'desc')
        ->get()
        ->map(function ($item) {
            return [
                'id'            => $item->id,
                'changed_by'    => $item->user ? $item->user->name : 'System',
                'changed_at'    => $item->changed_at,
                'snapshot_json' => $item->snapshot_json,
                'shed_name'     => $item->shed ? $item->shed->loco_shed : null,
            ];
        });

    return response()->json($history);
}



public function training_section_details($id)
{ $dept1 = KavachTrainingSection::with('staff')
            ->where('new_project_id', $id)
            ->whereHas('staff', fn($q) => $q->where('dept_id', 1))
            ->get();

$dept2 = KavachTrainingSection::with('staff')
            ->where('new_project_id', $id)
            ->whereHas('staff', fn($q) => $q->where('dept_id', 2))
            ->get();

$dept3 = KavachTrainingSection::with('staff')
            ->where('new_project_id', $id)
            ->whereHas('staff', fn($q) => $q->where('dept_id', 3))
            ->get();

      $departments = \App\Models\DepartmentMaster::orderBy('staff_dept')->get();

    return view('training_section_details', compact('id','departments','dept1','dept2','dept3'));
}

public function getStaffByDept($deptId)
{
    $staff = StaffMaster::where('dept_id', $deptId)->orderBy('designation')->get();
    return response()->json($staff);
}




public function training_section_store(Request $request)
{
    $request->validate([
        'new_project_id'  => 'required|integer',
        'staff_id'        => 'required|integer',
        'total_strength'  => 'required|integer',
    ]);

    $section = KavachTrainingSection::create([
        'new_project_id'   => $request->new_project_id,
        'staff_id'         => $request->staff_id,
        'total_strength'   => $request->total_strength,
        'iriset'           => 0,
        'self'             => 0,
        'other'            => 0,
        'remarks'          => $request->remarks ?? null,
    ]);

    // ✅ History Save
    \App\Models\KavachTrainingSectionHistory::create([
        'training_section_id' => $section->id,
        'new_project_id'      => $section->new_project_id,
        'staff_id'            => $section->staff_id,
        'snapshot_json'       => json_encode($section->toArray()),
        'changed_by'          => auth()->id(),
        'changed_at'          => now(),
    ]);

    return redirect()->back()->with('success', 'KAVACH Training Section Data Saved Successfully!');
}





public function training_update_section(Request $request, $id)
{
    $section = KavachTrainingSection::findOrFail($id);

    $section->update([
        'iriset'   => $request->iriset,
        'self'     => $request->self,
        'other'    => $request->other,
        'remarks'  => $request->remarks,
    ]);

    // ✅ History Save
    \App\Models\KavachTrainingSectionHistory::create([
        'training_section_id' => $section->id,
        'new_project_id'      => $section->new_project_id,
        'staff_id'            => $section->staff_id,
        'snapshot_json'       => json_encode($section->toArray()),
        'changed_by'          => auth()->id(),
        'changed_at'          => now(),
    ]);

    return redirect()->back()->with('success', 'KAVACH Training Section Data updated successfully!');
}



public function getTrainingSectionHistory($id)
{
   $history = \App\Models\KavachTrainingSectionHistory::with(['staff', 'user'])
        ->where('training_section_id', $id)
        ->orderBy('id', 'desc')
        ->get()
        ->map(function ($item) {
            return [
                'id'            => $item->id,
                'changed_by'    => $item->user ? $item->user->name : 'System',
                'changed_at'    => $item->changed_at,
                'snapshot_json' => $item->snapshot_json,
                'designation'   => $item->staff ? $item->staff->designation : null, // 👈 staff_id se designation
            ];
        });


    return response()->json($history);
}











public function savePreparatoryScope(Request $request)
{
    // 1) Validate input
    $data = $request->validate([
        'new_project_id'          => ['required','integer','exists:new_project,id'],
        'items'                   => ['required','array','min:1'],
        'items.*.item_id'         => ['required','integer','exists:master_object_item,id'],
        'items.*.scope'           => ['nullable','numeric'],   // ya ['required','numeric'] if needed
        'items.*.description'     => ['nullable','string'],
    ]);

    $projectId = (int) $data['new_project_id'];

    // 2) One-time guard: agar pehle se kuch save hai to block
    if (PreparatoryScope::where('new_project_id', $projectId)->exists()) {
        return redirect()
            ->route('object_details', $projectId)
            ->with('info', 'This project is already saved once.');
    }

    // 3) Rows build (empty lines skip) + batch insert
    $rows = [];
    $now  = now();

    foreach ($data['items'] as $row) {
        $desc  = $row['description'] ?? '';
        $scope = $row['scope'] ?? null;

        // khali line skip: na description, na scope
        if (($desc === null || $desc === '') && ($scope === null || $scope === '')) {
            continue;
        }

        $rows[] = [
            'new_project_id' => $projectId,
            'item_id'        => (int) $row['item_id'],
            'description'    => $desc ?? '',
            'scope'          => $scope === '' ? 0 : (float) $scope,
            'progress'       => 0,
            'created_at'     => $now,
            'updated_at'     => $now,
        ];
    }

    if (empty($rows)) {
        return back()->with('warning', 'Nothing to save. Please fill at least one row.');
    }

    DB::transaction(function () use ($rows) {
        PreparatoryScope::insert($rows); // fast bulk insert
    });

    // 4) Redirect back to details page -> wahan $isLocked true ho jayega (save button hide + fields disabled)
    return redirect()
        ->route('object_details', $projectId)
        ->with('success', 'Data saved successfully!');
}



public function user_details()
{
    $data = PreparatoryScope::with(['project', 'item', 'history'])->get();

    $cat1 = $data->filter(fn($row) => $row->item && $row->item->object_id == 1);
    $cat2 = $data->filter(fn($row) => $row->item && $row->item->object_id == 2);
    $cat3 = $data->filter(fn($row) => $row->item && $row->item->object_id == 3);

    return view('user_details', compact('cat1', 'cat2', 'cat3'));
}





public function updateProgress(Request $request)
{
    $scopeId = $request->scope_id;
    $progress = $request->progress[$scopeId];

    // Scope record find karo
    $scope = PreparatoryScope::findOrFail($scopeId);

    // 1. Update only progress in preparatory_scope
    $scope->progress = $progress;
    $scope->save();

    // 2. Insert history
    PreparatoryItemHistory::create([
        'scope_id' => $scope->id,
        'scope'    => $scope->scope,
        'progress' => $progress,
    ]);

    return back()->with('success', 'Progress updated successfully!');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

