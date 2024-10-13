<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\contact;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
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


    public function index()
    {
        $contacts= contact::all();

        return view('Admin.contact.index', compact('contacts'));
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
        contact::newcontacts($request);
        $this->toastr->success('Contact Inserted successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        // return response()->json($contact);
        return view('Admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        contact::updatecontacts($request, $contact);
        $this->toastr->success('Contact Updated successfully!');
        return back();
    }
    
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contact $contact)
    {
        contact::deletecontacts($contact);   
        $this->toastr->success('Contact deleted successfully!');
        return back();
    }
}
