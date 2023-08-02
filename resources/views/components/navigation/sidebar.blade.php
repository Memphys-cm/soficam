@inject('request', 'Illuminate\Http\Request')
<nav id="sidebarMenu" class="sidebar d-lg-block bg-primary text-white collapse" data-simplebar="init">
    <div class="simplebar-wrapper" style="margin: 0px;">
        <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
        </div>
        <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                    <div class="simplebar-content" style="padding: 0px;">
                        <div class="sidebar-inner px-4 pt-3">
                            <div class="user-card d-flex d-md-none justify-content-between justify-content-md-center pb-4">
                                @auth
                                <div class="d-flex align-items-center">
                                    <div class="avatar-md me-3 d-flex align-items-center justify-content-center fw-bold rounded bg-gray-50 shadow "><span class="p-2 text-secondary ">{{auth()->user()->initials}}</span></div>
                                    <div class="d-block ">
                                        <h2 class="h5 mb-0">{{auth()->user()->first_name}}</h2>
                                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <svg class="icon icon-xs dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            {{__('Logout')}}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                @endauth
                                <div class="collapse-close d-md-none"><a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"><svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg></a></div>
                            </div>
                            <div class="d-flex-row justify-content-center align-items-center text-center">

                                <div class="mt-2 mb-1 text-start">
                                    <span class="ml-0 lead "><span class="bg-white px-1 border rounded text-secondary display-4">{{__('Admin')}}</span> <span class="display-4">{{__('Portal')}}</span></span>
                                    <!-- <img src="{{asset('img/logo.png')}}" class="rounded" id="fullLogo" alt="SofiCam"> -->
                                    <!-- <img src="{{asset('img/fav.jpeg')}}" class="rounded d-none" id="smallLogo" alt="SofiCam"> -->

                                </div>
                            </div>
                            <ul class="nav flex-column pt-3 pt-md-0">
                                <li class="nav-item mt-3 {{ $request->routeIs('portal.dashboard.*') ? 'active' : '' }}">
                                    <a href="{{route('portal.dashboard')}}" class="nav-link d-flex align-items-center justify-content-between">
                                        <span>
                                            <span class="sidebar-icon  text-gary-50">
                                                <svg class="icon icon-sm me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                                </svg>
                                            </span>
                                            <span class="sidebar-text">{{__('Dashboard')}}</span>
                                        </span>
                                    </a>
                                </li>
                                <li role="separator" class="dropdown-divider mt-2 mb-2 border-gray-600"></li>

                                @canany('region.view','division.view','sub_division.view')

                                <li class="nav-item">
                                    <span class="nav-link d-flex justify-content-between align-items-center {{ $request->routeIs('portal.regions.index') || $request->routeIs('portal.divisions.index') || $request->routeIs('portal.sub-divisions.index')  ? 'collapse' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#submenu-dashboard"><span>
                                            <span class="sidebar-icon">
                                                <svg class="icon icon-sm " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                </svg>
                                            </span>
                                            <span class="sidebar-text">{{__('Locations')}}</span>
                                        </span>
                                        <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="multi-level collapse {{ $request->routeIs('portal.regions.index') || $request->routeIs('portal.divisions.index') || $request->routeIs('portal.sub-divisions.index')  ? 'show' : '' }}" role="list" id="submenu-dashboard" aria-expanded="{{ $request->routeIs('portal.regions.index') || $request->routeIs('portal.division.index') || $request->routeIs('portal.sub_division.index')  ? 'false' : 'true' }}">
                                        <ul class="flex-column nav">
                                            @can('region.view')
                                            <li class="nav-item {{$request->routeIs('portal.regions.index') ? 'active' :'' }}">
                                                <a href="{{route('portal.regions.index')}}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{__('Regions')}}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('division.view')
                                            <li class="nav-item {{$request->routeIs('portal.divisions.index') ? 'active' :'' }}">
                                                <a href="{{route('portal.divisions.index')}}" class="nav-link">
                                                    <span class="sidebar-text-contracted">D</span> <span class="sidebar-text">{{__('Divisions')}}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('sub_division.view')
                                            <li class="nav-item {{$request->routeIs('portal.sub-divisions.index') ? 'active' :'' }}">
                                                <a href="{{route('portal.sub-divisions.index')}}" class="nav-link">
                                                    <span class="sidebar-text-contracted">SD</span> <span class="sidebar-text">{{__('Sub-Divisions')}}</span>
                                                </a>
                                            </li>
                                            @endcan

                                        </ul>
                                    </div>
                                </li>
                                @endcanany


                                @can('service.view')
                                <li class="nav-item {{ $request->routeIs('portal.services.*') ? 'active' : '' }}">
                                    <a href="{{route('portal.services.index')}}" class="nav-link">
                                        <span class="sidebar-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon icon-sm me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                            </svg>

                                            <!-- <svg class="icon icon-sm me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                            </svg> -->
                                        </span>
                                        <span class="sidebar-text">{{__('Services Mgt')}}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('user.view')
                                <li class="nav-item {{ $request->routeIs('portal.users.*') ? 'active' : '' }}">
                                    <a href="{{route('portal.users.index')}}" class="nav-link">
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-sm me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">{{__('Users Mgt')}}</span>
                                    </a>
                                </li>
                                @endcan
                                @can('role.view')
                                <li class="nav-item {{ $request->routeIs('portal.roles.*') ? 'active' : '' }}">
                                    <a href="{{route('portal.roles.index')}}" class="nav-link">
                                        <span class="sidebar-icon">
                                            <!-- <svg class="icon icon-sm me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg> -->
                                            <svg class="icon icon-sm me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                                            </svg>

                                        </span>
                                        <span class="sidebar-text">{{__('Roles & Permissions')}}</span>
                                    </a>
                                </li>
                                @endcan
                                @canany('audit_log.view_all','audit_log.view_own_only')
                                <li class="nav-item {{ $request->routeIs('portal.auditlogs.*') ? 'active' : '' }}">
                                    <a href="{{route('portal.auditlogs.index')}}" class="nav-link">
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-sm me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">{{__('Audit Logs')}}</span>
                                    </a>
                                </li>
                                @endcanany
                                {{-- @canany('region.view','division.view','sub_division.view') --}}

                                <li class="nav-item">
                                    <span class="nav-link d-flex justify-content-between align-items-center {{ $request->routeIs('portal.sales.simpleSale.index') || $request->routeIs('portal.divisions.index')  ? 'collapse' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#subsales-dashboard"><span>
                                            <span class="sidebar-icon">
                                                <svg class="icon icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
  <line x1="12" y1="7" x2="12" y2="17" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
  <line x1="16" y1="10" x2="8" y2="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
  <line x1="16" y1="14" x2="8" y2="14" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
</svg>

                                            </span>
                                            <span class="sidebar-text">{{__('Sales')}}</span>
                                        </span>
                                        <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="multi-level collapse {{ $request->routeIs('portal.simpleSales.index') || $request->routeIs('portal.divisions.index') || $request->routeIs('portal.sub-divisions.index')  ? 'show' : '' }}" role="list" id="subsales-dashboard" aria-expanded="{{ $request->routeIs('portal.simpleSale.index') || $request->routeIs('portal.division.index') || $request->routeIs('portal.sub_division.index')  ? 'false' : 'true' }}">
                                        <ul class="flex-column nav">
                                            {{-- @can('simpleSale.view') --}}
                                            <li class="nav-item {{$request->routeIs('portal.simpleSale.index') ? 'active' :'' }}">
                                                <a href="{{route('portal.simpleSale.index')}}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{__('Simple Sales')}}</span>
                                                </a>
                                            </li>
                                            {{-- @endcan --}}
                                            {{-- @can('division.view')
                                            <li class="nav-item {{$request->routeIs('portal.divisions.index') ? 'active' :'' }}">
                                                <a href="{{route('portal.divisions.index')}}" class="nav-link">
                                                    <span class="sidebar-text-contracted">D</span> <span class="sidebar-text">{{__('Divisions')}}</span>
                                                </a>
                                            </li>
                                            @endcan --}}
                                            

                                        </ul>
                                    </div>
                                </li>
                                {{-- @endcanany --}}

                                <!-- <li role="separator" class="dropdown-divider mt-2 mb-2 border-gray-600"></li>
                                <li class="nav-item">
                                    <a href="" target="_blank" class="nav-link d-flex align-items-center">
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-sm me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">{{__('Support')}}
                                            <span class="badge badge-md bg-secondary ms-1 text-gray-50">v0.1</span>
                                        </span>
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
    </div>
    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
    </div>
    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
        <div class="simplebar-scrollbar" style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
    </div>
</nav>