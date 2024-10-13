<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Flasher\Toastr\Prime\ToastrInterface;
use App\Models\categorie;
use App\Models\poem;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PoemController extends Controller
{
    
    protected $toastr;
    public function __construct(ToastrInterface $toastr)
    {
        $this->middleware('auth');
        $this->toastr = $toastr;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $poem= poem::all();
            return DataTables::of($poem)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="fa fa-edit"></i>
                              </a>
                                <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                    <i class="fa fa-trash"></i>
                                </button>
                            <form id="delete-form-' . $row->id . '" action="' . route('poem.destroy', $row->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>';
                return $actionbtn;
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }
        return view('admin.poem.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.poem.create');
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
        poem::newPoems($request);
        $this->toastr->success('Poem Inserted successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(poem $poem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(poem $poem)
    {
        $categories=categorie::all();
         return view('admin.poem.edit', compact('poem','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, poem $poem)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
    
        poem::updatePoems($request, $poem);
        $this->toastr->success('Poem updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(poem $poem)
    {
        poem::deletePoems($poem);
        $this->toastr->success('Poem deleted successfully!');
        return back();
    }
}