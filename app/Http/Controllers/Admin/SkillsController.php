<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skills;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    // Toastr message calling
    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->middleware('auth');
        $this->toastr = $toastr;
    }

  // View File operation
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $skills = Skills::all();
            return DataTables::of($skills)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete-form-' . $row->id . '" action="' . route('skill.destroy', $row->id) . '" method="POST" style="display: none;">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                  </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.Office.Skills.index'); // Update the view path as needed
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    // Insert operation    
    public function store(Request $request)
    {
        // Check Validation data
        $request->validate([
            'skills_name' => 'required|max:255',
            'skills_percentage' => 'required|numeric',
            'skills_experience' => 'required|max:255',
        ]);

        Skills::newSkills($request);
        $this->toastr->success('Skill inserted successfully!');
        return back();
    }

    //Display data   
    public function show(Skills $skill)
    {
      
    }

    // Fetching the edit file
     public function edit(Skills $skill)
     {
      return view('admin.Office.Skills.edit', compact('skill')); 
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skills $skill)
    {
        // Check Validation data
        $request->validate([
            'skills_name' => 'required|max:255',
            'skills_percentage' => 'required|numeric',
            'skills_experience' => 'required|max:255',
        ]);

        // Pass the $skill model instance directly to the updateSkills method
        Skills::updateSkills($request, $skill);
        $this->toastr->success('Skill updated successfully!');
        return back();
    }

    // Delete operation    
    public function destroy(Skills $skill)
    {
       Skills::deleteSkills($skill);
        $this->toastr->success('Skill deleted successfully!');
        return back();
    }
}
