<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\advertisement;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdvertisementController extends Controller
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
            $advertisement= advertisement::all();
            return DataTables::of($advertisement)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                if ($row->image) {
                    return '<img src="' . asset($row->image) . '" alt="image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
                } else {
                    return 'No logo uploaded';
                }
            })
            ->addColumn('action', function ($row) {
                $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="fa fa-edit"></i>
                              </a>
                                <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                    <i class="fa fa-trash"></i>
                                </button>
                            <form id="delete-form-' . $row->id . '" action="' . route('advertisement.destroy', $row->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>';
                return $actionbtn;
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }
        return view('admin.Advertisement.index');
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
            'title' => 'required|string|max:255',
            
        ]);
        // dd($request->all()); 
        advertisement::newAdvertisement($request);
        $this->toastr->success('Brand Inserted successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(advertisement $advertisements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(advertisement $advertisements)
    {
        return view('admin.Advertisement.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, advertisement $advertisements)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
    
        advertisement::updateAdvertisement($request, $advertisements);
        $this->toastr->success('Advertisement updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(advertisement $advertisements)
    {
        advertisement::deleteAdvertisement($advertisements);
        $this->toastr->success('Advertisement deleted successfully!');
        return back();
    }

}
