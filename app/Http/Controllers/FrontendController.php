<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Teams;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('frontend.Pages.index', compact('services'));
    }

    public function about(){
        $abouts = About::all();
        return view('frontend.Pages.about',compact('abouts'));
    }
    
    public function team(){
        $teams = Teams::all();
        $services = Service::all();
        return view('frontend.Pages.teams', compact('teams','services'));
    }

    public function teamDetail(){
        $teams = Teams::all();
        $services = Service::all();
        return view('frontend.Pages.team_details', compact('teams','services'));
    }

    public function service(){
        $services = Service::all();
        $abouts = About::all();
        return view('frontend.Pages.service', compact('services','abouts'));
    }

    public function servicedetail(){
        $services = Service::all();
        return view('frontend.Pages.service_details', compact('services'));
    }

    public function skillPrefer(){
        $services = Service::all();
        return view('frontend.Pages.skills', compact('services'));
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



