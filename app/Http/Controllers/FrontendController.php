<?php

namespace App\Http\Controllers;

use App\Models\Epaper;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
    //    $epapers=Epaper::all();
        return view('frontend.pages.index');//,compact('epapers')
    }
    public function epaper(){
       $epapers=Epaper::all();
        return view('frontend.pages.epaper',compact('epapers'));//
    }
    public function epaperdetails($slug){
        $epapers=Epaper::where('paper_slug',$slug)->first();
        
        // dd($releted_product);
        return view('frontend.pages.epaper_details', compact('epapers'));
    
}
}
