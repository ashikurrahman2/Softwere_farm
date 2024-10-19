@php
    $setting = App\Models\Setting::first();
@endphp
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('admin.home') }}" class="b-brand text-primary">
                <!-- Change your logo from here -->
                 <img src="{{ url($setting->logo) }}" alt="logo image" class="logo-lg" style="max-width: 150px; max-height: 50px;"> 
                <span class="badge bg-primary rounded-pill ms-2 theme-version">CodeXillium Solutions</span>
            </a>
        </div>
        
        <div class="card pc-user-card">
            <div class="card-body">
                <div class="nav-user-image"><a data-bs-toggle="collapse" href="#navuserlink"><img
                            src="{{asset('/')}}admin/assets/images/user/avatar-1.jpg" alt="user-image"
                            class="user-avtar rounded-circle"></a></div>
                <div class="pc-user-collpsed collapse" id="navuserlink">
                    <h4 class="mb-0">{{Auth::user()->name}}</h4><span>Administrator</span>
                    <ul>
                        <li><a class="pc-user-links"><i class="ph-duotone ph-user"></i> <span>My Account</span></a>
                        </li>
                        <li><a class="pc-user-links"><i class="ph-duotone ph-gear"></i> <span>Settings</span></a>
                        </li>
                        <li><a class="pc-user-links"><i class="ph-duotone ph-lock-key"></i> <span>Lock
                                    Screen</span></a></li>
                        <li><a href="{{ route('admin.logout') }}"  class="pc-user-links"><i class="ph-duotone ph-power"></i> <span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption"><label>Admin Panel</label></li>
                <li class="pc-item pc-hasmenu"><a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ph-duotone ph-gauge"></i> </span>
                        <span class="pc-mtext">Dashboard</span>
                        <span class="pc-arrow"></span></a>
                </li>
                <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-layout-grid-add"></i></span>
                                <span class="pc-mtext">Office Info</span>
                                <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                             <li class="pc-item">
                                <a class="pc-link" href="{{route('abouts.index')}}">About</a>
                            </li>
                            <li class="pc-item"><a class="pc-link"
                               href="{{route('team.index')}}">Teams</a>
                           </li>  

                           {{-- <li class="pc-item"><a class="pc-link"
                            href="{{route('poem.index')}}">কবিতা</a>
                        </li> 

                        <li class="pc-item"><a class="pc-link"
                            href="{{ route('advertisement.index') }}">বিজ্ঞাপন</a>
                        </li> --}}
                        </ul>
                </li>
          
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-settings"></i></span>
                            <span class="pc-mtext">সেটিংস</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link"
                            href="{{route('seo.index')}}">এসইও সেটিংস</a>
                        </li>
                        <li class="pc-item"><a class="pc-link"
                            href="{{route('website.index')}}">ওয়েবসাইট সেটিংস</a>
                        </li>
                        <li class="pc-item"><a class="pc-link"
                            href="{{route('page.index')}}">পেইজ মেনেজমেন্ট</a>
                        </li>
                        <li class="pc-item"><a class="pc-link"
                            href="{{route('smtp.index')}}">এসএমটিপি সেটিংস</a>
                        </li>
                        {{-- <li class="pc-item"><a class="pc-link"
                            href="{{route('brand.index')}}">Payment Gateway</a>
                        </li> --}}
                        {{-- <li class="pc-item"><a class="pc-link"
            
                            href="{{ route('contacts.index') }}">যোগাযোগ</a>
                    </li> --}}
                    </ul>
                </li>

            </ul>
            <div class="card nav-action-card">
                <div class="card-body">
                    <h5 class="text-white">Help Center</h5>
                    <p class="text-white text-opacity-75">Please contact us for more questions.</p><a
                        target="_blank" href="https://phoenixcoded.authordesk.app/" class="btn btn-primary">Go to
                        help Center</a>
                </div>
            </div>
        </div>
    </div>
</nav>