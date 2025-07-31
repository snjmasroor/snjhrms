<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    
    public function index() {
        $branches = Branch::orderBy('id', 'desc')->get();
        return view('admin.branch.index', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        $branch = new Branch();
        $branch->name = $request->name;
        $branch->location = $request->location;
        $branch->addFlag(Branch::FLAG_ACTIVE);
        $branch->save();

        return redirect()->back()->with('success', 'Branch added successfully.');
    }
}
