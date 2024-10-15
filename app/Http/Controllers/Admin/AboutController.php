<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    // Toastr message calling
    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->middleware('auth');
        $this->toastr = $toastr;
    }
    // View Data operation
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $abouts = About::all();
            return DataTables::of($abouts)
                ->addIndexColumn()
                ->addColumn('self_image', function ($row) {
                    if ($row->self_image) {
                        return '<img src="' . asset($row->self_image) . '" alt="self_image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
                    } else {
                        return 'No image uploaded';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete-form-' . $row->id . '" action="' . route('abouts.destroy', $row->id) . '" method="POST" style="display: none;">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                  </form>';
                    return $actionbtn;
                })
                ->rawColumns(['self_image', 'action'])
                ->make(true);
        }

        return view('admin.Office.About.index');
    }
    // Insert data operation
    public function store(Request $request)
    {
        $request->validate([
            'self_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:1000',
            'sub_title' => 'required|string|max:500',
            'leader_name' => 'required|string|max:500',
            'leader_designation' => 'required|string|max:500',
            'company_name' => 'required|string|max:500',
            'our_mission' => 'nullable|string',
            'mission_details' => 'nullable|string',
            'complete_projects' => 'nullable|integer',
            'happy_clients' => 'nullable|integer',
            'skills_experts' => 'nullable|integer',
            'media_posts' => 'nullable|integer',
        ]);

        About::newAbout($request);
        $this->toastr->success('About info added successfully!');
        return back();
    }
    // Edit data operation  
    public function edit(About $about)
    {
        return view('admin.Office.About.edit', compact('about'));
    }
    public function update(Request $request, About $about)
    {
        $request->validate([
            'self_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:1000',
            'sub_title' => 'required|string|max:500',
            'leader_name' => 'required|string|max:500',
            'leader_designation' => 'required|string|max:500',
            'company_name' => 'required|string|max:500',
            'our_mission' => 'nullable|string',
            'mission_details' => 'nullable|string',
            'complete_projects' => 'nullable|integer',
            'happy_clients' => 'nullable|integer',
            'skills_experts' => 'nullable|integer',
            'media_posts' => 'nullable|integer',
        ]);

        About::updateAbout($request, $about);
        $this->toastr->success('About info updated successfully!');
        return back();
    }
    // Delete data operation
    public function destroy(About $about)
    {
        About::deleteAbout($about);
        $this->toastr->success('About info deleted successfully!');
        return back();
    }
}
