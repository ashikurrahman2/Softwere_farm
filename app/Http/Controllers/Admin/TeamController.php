<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teams;
use App\Http\Controllers\Controller;
use Flasher\Toastr\Prime\ToastrInterface;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class TeamController extends Controller
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
            $teams = Teams::all();
            return DataTables::of($teams)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        return '<img src="' . asset($row->image) . '" alt="image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
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
                                  <form id="delete-form-' . $row->id . '" action="' . route('team.destroy', $row->id) . '" method="POST" style="display: none;">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                  </form>';
                    return $actionbtn;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('admin.Office.Teams.index');
    }

    // Insert data operation
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'member_name' => 'required|string|max:1000',
            'member_details' => 'required|string|max:500',
            'company_name' => 'required|string|max:500',
            'designation' => 'required|string|max:500',
        ]);

        Teams::newTeam($request);
        $this->toastr->success('Teams info added successfully!');
        return back();
    }
  
    // Fetching the edit file
    public function edit($id)
    {
        $team = Teams::findOrFail($id);
        return view('admin.Office.Teams.edit', compact('team'));
    }
    
    // Edit data operation  
    public function update(Request $request, $id)
    {
        $request->validate([
            'member_name' => 'required|string|max:1000',
            'member_details' => 'string|max:500',
            'company_name' => 'required|string|max:500',
            'designation' => 'required|string|max:500',
        ]);

        Teams::updateTeam($request, $id);
        $this->toastr->warning('Teams info updated successfully!');
        return back();
    }

    // Delete Operation
    public function destroy($id)
    {
        $team = Teams::findOrFail($id);
        $team->delete();
        $this->toastr->error('Teams info deleted!');
        return back();
    }

}
