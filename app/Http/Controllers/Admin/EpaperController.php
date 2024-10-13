<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Epaper;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EpaperController extends Controller
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
            $epapers= Epaper::all();
            return DataTables::of($epapers)
            ->addIndexColumn()
            ->addColumn('Paper_image', function ($row) {
                if ($row->Paper_image) {
                    return '<img src="' . asset($row->Paper_image) . '" alt="Paper Image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
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
                            <form id="delete-form-' . $row->id . '" action="' . route('brand.destroy', $row->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>';
                return $actionbtn;
            })
            ->rawColumns(['Paper_image','action'])
            ->make(true);
        }
        return view('admin.category.epaper.index');
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
            'paper_title' => 'required|string|max:255',
            'paper_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'paper_pdf' => 'nullable|array',
            'paper_pdf.*' => 'mimes:pdf|max:10000', // Ensure each file is a PDF
        ]);
        // dd($request->all()); 
        Epaper::newEpapers($request);
        $this->toastr->success('Epaper Inserted successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Epaper $epaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Epaper $epaper)
    {
        return view('admin.category.epaper.edit', compact('epaper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Epaper $epaper)
    {
        $request->validate([
            'paper_title' => 'required|string|max:255',
            'paper_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'paper_pdf' => 'nullable',
            'paper_pdf' => 'mimes:pdf|max:10000', // Ensure each file is a PDF
        ]);
     
        Epaper::updateEpapers($request, $epaper);
       
        $this->toastr->success('Epaper updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Epaper $epaper)
    {
        Epaper::deleteEpapers($epaper);
        $this->toastr->success('Epaper deleted successfully!');
        return back();
    }
}
