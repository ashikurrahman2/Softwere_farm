@extends('layouts.app')

@section('title', 'Team Details')

@section('content')
<div class="container team-section">
    <h2 class="text-center" style="margin-top: 150px; color:mediumvioletred;">Meet Our Team</h2>
    <!-- Team Member 2 -->
    <div class="team-member">
        @foreach($teams as $team)
        <img src="{{ asset($team->image) }}" alt="img">
        <div class="team-info">
            <h5 style="color: red;">{{ $team->member_name }}</h5>
            <p style="color: black;"><strong>Designation:</strong>{{ $team->designation }}</p>
            <p style="color: black;"><strong>Summary:</strong>{{ $team->member_details }}</p>
            <p class="company-name" style="color: black;"><strong>Company:</strong>{{ $team->company_name }}</p>
            <div class="skills">
                @php
                 // Split the skills string into an array
                    $skills = explode(',', $team->skills);
                @endphp
                @foreach($skills as $skill)
                    <span class="badge badge-info">{{ $skill }}</span>
                @endforeach
            </div>
            <a href="#" class="btn btn-primary contact-btn">Contact Me</a>
        </div>
    </div>
    @endforeach
</div>
@include('frontend.layouts.custom_style')
@include('frontend.layouts.custom_script')
@endsection