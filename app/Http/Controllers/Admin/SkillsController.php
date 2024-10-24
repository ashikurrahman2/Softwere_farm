<?php

namespace App\Http\Controllers\Admin;
use App\Models\Skills;
use App\Http\Controllers\Controller;
use Flasher\Toastr\Prime\ToastrInterface;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $toastr;
    public function __construct(ToastrInterface $toastr)
    {
        $this->middleware('auth');
        $this->toastr = $toastr;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Skills::query())
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                    <i class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete-form-' . $row->id . '" action="' . route('skills.destroy', $row->id) . '" method="POST" style="display: none;">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                  </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.Office.Skills.index'); // Adjust the view as necessary
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'skills_name' => 'required|string|max:500',
        ]);

        Skills::newSkill($request); // Call the model's method to create a new skill
        $this->toastr->success('Skill added successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Skills $skills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skills $skills)
    {
        return view('admin.Office.Skills.edit', compact('skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skills $skills)
    {
        $request->validate([
            'skills_name' => 'required|string|max:500',
        ]);
        Skills::updateSkill($request, $skills);
        $this->toastr->success('skills updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skills $skills)
    {
        Skills::deleteSkill($skills);
        $this->toastr->success('skills deleted successfully!');
        return back();
    }
}
