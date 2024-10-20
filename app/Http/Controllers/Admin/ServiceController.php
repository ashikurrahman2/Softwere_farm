<?php
namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Flasher\Toastr\Prime\ToastrInterface;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
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
            $services = Service::all();
            return DataTables::of($services)
                ->addIndexColumn()
                ->addColumn('service_image', function ($row) {
                    if ($row->service_image) {
                        return '<img src="' . asset($row->service_image) . '" alt="service_image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
                    } else {
                        return 'No image uploaded';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete-form-' . $row->id . '" action="' . route('service.destroy', $row->id) . '" method="POST" style="display: none;">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                  </form>';
                    return $actionBtn;
                })
                ->rawColumns(['service_image', 'action'])
                ->make(true);
        }

        return view('admin.Office.Service.index');
    }

    // Insert Operation
    public function store(Request $request)
    {
        $request->validate([
            'service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'service_title' => 'required|string|max:1000',
            'service_description' => 'required|string|max:500',
        ]);

        Service::newService($request);
        $this->toastr->success('Service added successfully!');
        return back();
    }

    // Fetching edit file
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.Office.Service.edit', compact('service'));
    }

    // Update operation
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'service_title' => 'required|string|max:1000',
            'service_description' => 'required|string|max:500',
        ]);

        Service::updateService($request, $service->id);
        $this->toastr->success('Service updated successfully!');
        return back();
    }

    
    // Delete Operation
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        $this->toastr->success('Service deleted successfully!');
        return back();
    }
}
