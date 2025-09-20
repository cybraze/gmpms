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

    // dd($id);
    // Sheet ke objects laa rahe hai
    $objects = SheetObject::all(); // ✅ yaha get() hata diya

    // Har object ke andar ke items nikaalna
    $data = [];
    foreach ($objects as $object) {
        $items = MasterObjectItem::where('object_id', $object->id)->get();

        $data[] = [
            'object_name' => $object->object_name,
            'items'       => $items
        ];
    }

    // Data blade ko bhejna
    return view('object_details', compact('data','id'));
}









public function savePreparatoryScope(Request $request)
{
    // Multiple items ek sath store karne ke liye loop
    foreach ($request->items as $item) {
        PreparatoryScope::create([
            'new_project_id' => $request->new_project_id,
            'item_id'        => $item['item_id'],
            'scope'          => $item['scope'],
            'description'    => $item['description'],
            'progress'       => 0, // default rakha
        ]);
    }

    return redirect()->back()->with('success', 'Data saved successfully!');
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

