<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('frontend.Pages.index',compact('abouts'));
    }
    // Viewing the team pages    
    public function team(){
        return view('frontend.Pages.teams');
    }

    public function service(){
        return view('frontend.Pages.service');
    }

    public function skillPrefer(){
        return view('frontend.Pages.skills');
    }

    public function communicate()
    {
        return view('frontend.Pages.contact');
    }

    public function message()
    {
        return view('frontend.Pages.message_us');
            
        }
    }

