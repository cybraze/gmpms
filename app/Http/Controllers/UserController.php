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

    public function home()
    {
        return view('home');
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
            'project_type_id' => 'required|exists:project_type,id',
            'project_name' => 'required|string|max:255',
        ]);

        // ✅ Insert data
        NewProject::create([
            'project_type_id' => $request->project_type_id,
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
    $data = GkSectionData::with('section')->get();
    $towerdata = TowerSectionData::with('section')->get();
    $ofcdata = OfcSectionData::with('section')->get();


    return view('section_target_details', compact('sections','data','id','towerdata','ofcdata'));
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

    GkSectionData::create([
        'new_project_id'  => $request->new_project_id,
        'section_id'      => $request->section_id,
        'rkm'             => $request->rkm,
        
        // RFID
        'rfid_scope'      => $request->rfid_scope,
        'rfid_comp'       => 0,

        // SE
        'se_stn_scope'    => $request->se_stn_scope,
        'se_stn_comp'     => 0,
        'se_hut_scope'    => $request->se_hut_scope,
        'se_hut_comp'     => 0,

        // FAT
        'fat_stn_scope'   => $request->fat_stn_scope,
        'fat_stn_comp'    => 0,
        'fat_hut_scope'   => $request->fat_hut_scope,
        'fat_hut_comp'    => 0,

        // SAT
        'sat_stn_scope'   => $request->sat_stn_scope,
        'sat_stn_comp'    => 0,
        'sat_hut_scope'   => $request->sat_hut_scope,
        'sat_hut_comp'    => 0,

        // IDD
        'idd_stn_scope'   => $request->idd_stn_scope,
        'idd_stn_comp'    => 0,
        'idd_hut_scope'   => $request->idd_hut_scope,
        'idd_hut_comp'    => 0,
    ]);

    return redirect()->back()->with('success', 'Section Data Saved Successfully!');
}






 public function tower_section_store(Request $request)
{
    $request->validate([
        'new_project_id'  => 'required|integer',
        'section_id'      => 'required|integer',
        'rkm'             => 'required|integer',
        'tower_foundation_stn_scope'      => 'required|integer',
        'tower_erection_stn_scope'    => 'required|integer',
        'tower_foundation_scope'   => 'required|integer',
        'tower_erection_scope'   => 'required|integer',
    ]);

    TowerSectionData::create([
        'new_project_id'  => $request->new_project_id,
        'section_id'      => $request->section_id,
        'rkm'             => $request->rkm,
        
        // RFID
        'tower_foundation_stn_scope'      => $request->tower_foundation_stn_scope,
        'tower_foundation_stn_comp'       => 0,

        // SE
        'tower_erection_stn_scope'    => $request->tower_erection_stn_scope,
        'tower_erection_stn_comp'     => 0,
        'tower_foundation_scope'    => $request->tower_foundation_scope,
        'tower_foundation_comp'     => 0,

        // FAT
        'tower_erection_scope'   => $request->tower_erection_scope,
        'tower_erection_comp'    => 0,
        
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

    return redirect()->back()->with('success', 'Data updated successfully!');
}






public function tower_update_section(Request $request, $id)
{
    $section = TowerSectionData::findOrFail($id);

    $section->update([
        'tower_foundation_stn_comp'     => $request->tower_foundation_stn_comp,
        'tower_erection_stn_comp'   => $request->tower_erection_stn_comp,
        'tower_foundation_comp'   => $request->tower_foundation_comp,
        'tower_erection_comp'  => $request->tower_erection_comp,
    ]);

    return redirect()->back()->with('success', 'Tower Data updated successfully!');
}








 public function ofc_section_store(Request $request)
{
    $request->validate([
        'new_project_id'  => 'required|integer',
        'section_id'      => 'required|integer',
        'rkm'             => 'required|integer',
        'ofc_duct_scope'    => 'required|integer',
        'ofc_lay_scope'   => 'required|integer',
        'outdoor_design_scope'   => 'required|integer',
    ]);

    OfcSectionData::create([
        'new_project_id'  => $request->new_project_id,
        'section_id'      => $request->section_id,
        'rkm'             => $request->rkm,
        
        // RFID
        'ofc_duct_scope'      => $request->ofc_duct_scope,
        'ofc_duct_comp'       => 0,

        // SE
        'ofc_lay_scope'    => $request->ofc_lay_scope,
        'ofc_lay_comp'     => 0,
        'outdoor_design_scope'    => $request->outdoor_design_scope,
        'outdoor_design_comp'     => 0,

        
        
    ]);

    return redirect()->back()->with('success', 'OFC Section Data Saved Successfully!');
}


public function ofc_update_section(Request $request, $id)
{
    $section = OfcSectionData::findOrFail($id);

    $section->update([
        'ofc_duct_comp'     => $request->ofc_duct_comp,
        'ofc_lay_comp'   => $request->ofc_lay_comp,
        'outdoor_design_comp'   => $request->outdoor_design_comp,
    ]);

    return redirect()->back()->with('success', 'OFC Data updated successfully!');
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

