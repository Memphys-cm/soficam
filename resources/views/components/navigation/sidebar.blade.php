@inject('request', 'Illuminate\Http\Request')
<nav id="sidebarMenu" class="sidebar d-lg-block bg-primary text-white collapse" data-simplebar="init">
    <div class="simplebar-wrapper" style="margin: 0px;">
        <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
        </div>
        <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                <div class="simplebar-content-wrapper" style="height: auto; overflow: auto;">
                    <div class="simplebar-content" style="padding: 0px;">
                        <div class="sidebar-inner px-4 pt-3">
                            <div class="user-card d-flex d-md-none justify-content-between justify-content-md-center pb-4">
                                @auth
                                <div class="d-flex align-items-center">
                                    <div class="avatar-md me-3 d-flex align-items-center justify-content-center fw-bold rounded bg-gray-50 shadow ">
                                        <span class="p-2 text-secondary ">{{ auth()->user()->initials }}</span>
                                    </div>
                                    <div class="d-block ">
                                        <h2 class="h5 mb-0">{{ auth()->user()->first_name }}</h2>
                                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <svg class="icon icon-xs dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            {{ __('Logout') }}
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
                                    <span class="ml-0 lead "><span class="bg-white px-1 border rounded text-secondary display-4">{{ __('Admin') }}</span>
                                        <span class="display-4">{{ __('Portal') }}</span></span>
                                    <!-- <img src="{{ asset('img/logo.png') }}" class="rounded" id="fullLogo" alt="SofiCam"> -->
                                    <!-- <img src="{{ asset('img/fav.jpeg') }}" class="rounded d-none" id="smallLogo" alt="SofiCam"> -->

                                </div>
                            </div>
                            <ul class="nav flex-column pt-3 pt-md-0">
                                <li class="nav-item mt-3 {{ $request->routeIs('portal.dashboard.*') ? 'active' : '' }}">
                                    <a href="{{ route('portal.dashboard') }}" class="nav-link d-flex align-items-center justify-content-between">
                                        <span>
                                            <span class="sidebar-icon  text-gary-50">
                                                <svg class="icon icon-sm me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                                </svg>
                                            </span>
                                            <span class="sidebar-text">{{ __('Tableau de bord') }}</span>
                                        </span>
                                    </a>
                                </li>
                                <li role="separator" class="dropdown-divider mt-2 mb-2 border-gray-600"></li>
                                @canany('titre_foncier.view', 'certificate_propriete.view')
                                <li class="nav-item">
                                    <span class="nav-link d-flex justify-content-between align-items-center {{ $request->routeIs('portal.titre-fonciers.index') || $request->routeIs('portal.certificate-propriete.index') || $request->routeIs('portal.titre-fonciers-charges.index') ? 'collapse' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#submenu-land-title"><span>
                                            <span class="sidebar-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon icon-sm">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                                </svg>
                                            </span>
                                            <span class="sidebar-text">{{ __('Titres Fonciers') }}</span>
                                        </span>
                                        <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="multi-level collapse {{ $request->routeIs('portal.titre-fonciers.index') || $request->routeIs('portal.certificate-propriete.index') || $request->routeIs('portal.titre-fonciers-charges.index') ? 'show' : '' }}" role="list" id="submenu-land-title" aria-expanded="{{ $request->routeIs('portal.titre-fonciers.index') || $request->routeIs('portal.division.index') || $request->routeIs('portal.sub_division.index') ? 'false' : 'true' }}">
                                        <ul class="flex-column nav">
                                            @can('titre_foncier.view')
                                            <li class="nav-item {{ $request->routeIs('portal.titre-fonciers.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.titre-fonciers.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Tous les Titres Fonciers') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('certificate_propriete.view')
                                            <li class="nav-item {{ $request->routeIs('portal.certificate-propriete.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.certificate-propriete.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">D</span> <span class="sidebar-text">{{ __('Certificat Pro.') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('charge_titre_foncier.view')
                                            <li class="nav-item {{ $request->routeIs('portal.titre-fonciers-charges.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.titre-fonciers-charges.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">D</span> <span class="sidebar-text">{{ __('Charges') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcanany
                                @canany('lotissement.view', 'lotissement.create', 'lotissement.sales')
                                <li class="nav-item">
                                    <span class="nav-link d-flex justify-content-between align-items-center {{ $request->routeIs('portal.lotissements.*') ? 'collapse' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#submenu-lotissements"><span>
                                            <span class="sidebar-icon">
                                                <svg class="icon icon-sm" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 01-.657.643 48.39 48.39 0 01-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 01-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 00-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 01-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 00.657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 01-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 005.427-.63 48.05 48.05 0 00.582-4.717.532.532 0 00-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 00.658-.663 48.422 48.422 0 00-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 01-.61-.58v0z" />
                                                </svg>
                                            </span>
                                            <span class="sidebar-text">{{ __('Lotissements') }}</span>
                                        </span>
                                        <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="multi-level collapse {{ $request->routeIs('portal.lotissements.*') ? 'show' : '' }}" role="list" id="submenu-lotissements" aria-expanded="{{ $request->routeIs('portal.lotissements.index') ? 'false' : 'true' }}">
                                        <ul class="flex-column nav">
                                            @can('lotissement.view')
                                            <li class="nav-item {{ $request->routeIs('portal.lotissements.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.lotissements.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Tout Voir') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('lotissement.create')
                                            <li class="nav-item {{ $request->routeIs('portal.lotissements.create') ? 'active' : '' }}">
                                                <a href="{{ route('portal.lotissements.create') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Nouveau') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcanany
                                @canany('region.view', 'division.view', 'sub_division.view')
                                <li class="nav-item">
                                    <span class="nav-link d-flex justify-content-between align-items-center {{ $request->routeIs('portal.total-sale.index') || $request->routeIs('portal.cabinets.index') ? 'collapse' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#submenu-sales"><span>
                                            <span class="sidebar-icon">
                                                <svg class="icon icon-sm " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                </svg>

                                            </span>
                                            <span class="sidebar-text">{{ __('Ventes') }}</span>
                                        </span>
                                        <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="multi-level collapse {{ $request->routeIs('portal.total-sale.index') || $request->routeIs('portal.simple-sale.index') ? 'show' : '' }}" role="list" id="submenu-sales" aria-expanded="{{ $request->routeIs('portal.regions.index') || $request->routeIs('portal.division.index') || $request->routeIs('portal.sub_division.index') ? 'false' : 'true' }}">
                                        <ul class="flex-column nav">
                                            @can('region.view')
                                            <li class="nav-item {{ $request->routeIs('portal.simple-sale.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.simple-sale.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Simples') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('division.view')
                                            <li class="nav-item {{ $request->routeIs('portal.total-sale.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.total-sale.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">D</span> <span class="sidebar-text">{{ __('Mutation Totale') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcanany
                                @canany('mutation_totale.view', 'certificate_propriete.view')
                                <li class="nav-item">
                                    <span class="nav-link d-flex justify-content-between align-items-center {{ $request->routeIs('portal.state_assignments.index') || $request->routeIs('portal.mutation-totale.index')  || $request->routeIs('portal.immatriculation_directes.index')  || $request->routeIs('portal.morcellements.index') ? 'collapse' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#submenu-land-operations"><span>
                                            <span class="sidebar-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon icon-sm">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                                                </svg>

                                            </span>
                                            <span class="sidebar-text">{{ __('Operations') }}</span>
                                        </span>
                                        <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="multi-level collapse {{ $request->routeIs('portal.mutation-totale.index') || $request->routeIs('portal.state_assignments.index')  || $request->routeIs('portal.morcellements.index') ? 'show' : '' }}" role="list" id="submenu-land-operations" aria-expanded="{{ $request->routeIs('portal.mutation-totale.index') || $request->routeIs('portal.state_assignments.index') || $request->routeIs('portal.immatriculation_directes.index')  ? 'false' : 'true' }}">
                                        <ul class="flex-column nav">
                                            @can('etat_cession.view')
                                            <li class="nav-item {{ $request->routeIs('portal.state_assignments.*') ? 'active' : '' }}">
                                                <a href="{{ route('portal.state_assignments.index') }}" class="nav-link">
                                                    <span class="sidebar-text">{{ __('Etat cession') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('mutation_totale.view')
                                            <li class="nav-item {{ $request->routeIs('portal.mutation-totale.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.mutation-totale.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Mutation Totale') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('morcellement.view')
                                            <li class="nav-item {{ $request->routeIs('portal.morcellements.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.morcellements.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Morcellement') }}</span>
                                                </a>
                                            </li>
                                            @endcan

                                            @can('mutation_totale.view')
                                            <li class="nav-item {{ $request->routeIs('portal.immatriculation_directes.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.immatriculation_directes.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Imma Directe') }}</span>
                                                </a>
                                            </li>
                                            @endcan

                                        </ul>
                                    </div>
                                </li>
                                @endcanany

                                @can('etat_cession.view')
                                <li class="nav-item {{ $request->routeIs('portal.maps.*') ? 'active' : '' }}">
                                    <a href="{{ route('portal.maps.index') }}" class="nav-link">
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-sm me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">{{ __('Cartes') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('immobilier.view')
                                <li class="nav-item">
                                    <span class="nav-link d-flex justify-content-between align-items-center {{ $request->routeIs('portal.bien-mmobilier.index') || $request->routeIs('portal.immobilier.index') ? 'collapse' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#submenu-rbi"><span>
                                            <span class="sidebar-icon">
                                                <svg class="icon icon-sm " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                                                </svg>

                                            </span>
                                            <span class="sidebar-text">{{ __('Releve Biens') }}</span>
                                        </span>
                                        <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="multi-level collapse {{ $request->routeIs('portal.bien-mmobilier.index') || $request->routeIs('portal.immobilier.index') ? 'show' : '' }}" role="list" id="submenu-rbi" aria-expanded="{{ $request->routeIs('portal.regions.index') || $request->routeIs('portal.division.index') || $request->routeIs('portal.sub_division.index') ? 'false' : 'true' }}">
                                        <ul class="flex-column nav">
                                            @can('immobilier.view')
                                            <li class="nav-item {{ $request->routeIs('portal.immobilier.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.immobilier.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Releve Immo') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('immobilier.view')
                                            <li class="nav-item {{ $request->routeIs('portal.bien-mmobilier.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.bien-mmobilier.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">D</span> <span class="sidebar-text">{{ __('Biens Immo') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan

                                <li role="separator" class="dropdown-divider mt-2 mb-2 border-gray-600"></li>

                                @can('user.view')
                                <li class="nav-item {{ $request->routeIs('portal.allsales.*') ? 'active' : '' }}">
                                    <a href="{{ route('portal.allsales.index') }}" class="nav-link">
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-sm me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">{{ __('Paiements') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('user.view')
                                <li class="nav-item">
                                    <span class="nav-link d-flex justify-content-between align-items-center {{ $request->routeIs('portal.sales-report.index') || $request->routeIs('portal.taxfonciere.suivi.index') ? 'collapse' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#submenu-reports"><span>
                                            <span class="sidebar-icon">
                                                <svg class="icon icon-sm " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                                                </svg>

                                            </span>
                                            <span class="sidebar-text">{{ __('Rapports') }}</span>
                                        </span>
                                        <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="multi-level collapse {{ $request->routeIs('portal.sales-report.index') || $request->routeIs('portal.taxfonciere.suivi.index') ? 'show' : '' }}" role="list" id="submenu-reports" aria-expanded="{{ $request->routeIs('portal.sales-report.index')  ? 'true' : 'false' }}">
                                        <ul class="flex-column nav">
                                            @can('cabinet.view')
                                            <li class="nav-item {{ $request->routeIs('portal.sales-report.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.sales-report.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Paiements') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('tax_foncier.view')
                                            <li class="nav-item {{ $request->routeIs('portal.taxfonciere.suivi.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.taxfonciere.suivi.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Suivi TaxFoncier') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan

                                <li role="separator" class="dropdown-divider mt-2 mb-2 border-gray-600"></li>

                                @can('user.view')
                                <li class="nav-item {{ $request->routeIs('portal.users.*') ? 'active' : '' }}">
                                    <a href="{{ route('portal.users.index') }}" class="nav-link">
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-sm me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">{{ __('Gestion Utilisateurs') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @canany('membre_du_cabinet.view', 'cabinet.view')
                                <li class="nav-item">
                                    <span class="nav-link d-flex justify-content-between align-items-center {{ $request->routeIs('portal.membre-du-cabinets.index') || $request->routeIs('portal.cabinets.index') ? 'collapse' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#submenu-cabinet"><span>
                                            <span class="sidebar-icon">
                                                <svg class="icon icon-sm " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                                </svg>

                                            </span>
                                            <span class="sidebar-text">{{ __('Cabinets') }}</span>
                                        </span>
                                        <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="multi-level collapse {{ $request->routeIs('portal.membre-du-cabinets.index') || $request->routeIs('portal.cabinets.index') ? 'show' : '' }}" role="list" id="submenu-cabinet" aria-expanded="{{ $request->routeIs('portal.regions.index') || $request->routeIs('portal.division.index') || $request->routeIs('portal.sub_division.index') ? 'false' : 'true' }}">
                                        <ul class="flex-column nav">
                                            @can('cabinet.view')
                                            <li class="nav-item {{ $request->routeIs('portal.cabinets.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.cabinets.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Cabinets') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('membre_du_cabinet.view')
                                            <li class="nav-item {{ $request->routeIs('portal.membre-du-cabinets.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.membre-du-cabinets.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">D</span> <span class="sidebar-text">{{ __('Membres') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcanany
                                @can('service.view')
                                <li class="nav-item {{ $request->routeIs('portal.services.*') ? 'active' : '' }}">
                                    <a href="{{ route('portal.services.index') }}" class="nav-link">
                                        <span class="sidebar-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon icon-sm me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                                            </svg>

                                        </span>
                                        <span class="sidebar-text">{{ __('Gestion Services') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @canany('region.view', 'division.view', 'sub_division.view')
                                <li class="nav-item">
                                    <span class="nav-link d-flex justify-content-between align-items-center {{ $request->routeIs('portal.regions.index') || $request->routeIs('portal.totalsale.index') || $request->routeIs('portal.sub-divisions.index') ? 'collapse' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#submenu-dashboard"><span>
                                            <span class="sidebar-icon">
                                                <svg class="icon icon-sm " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                </svg>
                                            </span>
                                            <span class="sidebar-text">{{ __('Locations') }}</span>
                                        </span>
                                        <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="multi-level collapse {{ $request->routeIs('portal.regions.index') || $request->routeIs('portal.divisions.index') || $request->routeIs('portal.sub-divisions.index') ? 'show' : '' }}" role="list" id="submenu-dashboard" aria-expanded="{{ $request->routeIs('portal.regions.index') || $request->routeIs('portal.division.index') || $request->routeIs('portal.sub_division.index') ? 'false' : 'true' }}">
                                        <ul class="flex-column nav">
                                            @can('region.view')
                                            <li class="nav-item {{ $request->routeIs('portal.regions.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.regions.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Regions') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('division.view')
                                            <li class="nav-item {{ $request->routeIs('portal.divisions.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.divisions.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">D</span> <span class="sidebar-text">{{ __('Sous Regions') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('sub_division.view')
                                            <li class="nav-item {{ $request->routeIs('portal.sub-divisions.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.sub-divisions.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">SD</span> <span class="sidebar-text">{{ __('Arrondissements') }}</span>
                                                </a>
                                            </li>
                                            @endcan

                                        </ul>
                                    </div>
                                </li>
                                @endcanany
                                <li role="separator" class="dropdown-divider mt-2 mb-2 border-gray-600"></li>

                                @can('category_activites_and_activite.view')
                                <li class="nav-item {{ $request->routeIs('portal.category-activities.*') ? 'active' : '' }}">
                                    <a href="{{ route('portal.category-activities.activites') }}" class="nav-link">
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-sm me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">{{ __('Frais Loi Fin') }}</span>
                                    </a>
                                </li>
                                @endcan
                                @can('role.view')
                                <li class="nav-item {{ $request->routeIs('portal.roles.*') ? 'active' : '' }}">
                                    <a href="{{ route('portal.roles.index') }}" class="nav-link">
                                        <span class="sidebar-icon">
                                            <!-- <svg class="icon icon-sm me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                        </svg> -->
                                            <svg class="icon icon-sm me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                                            </svg>

                                        </span>
                                        <span class="sidebar-text">{{ __('Roles & Permissions') }}</span>
                                    </a>
                                </li>
                                @endcan
                                @canany('audit_log.view_all', 'audit_log.view_own_only')
                                <li class="nav-item {{ $request->routeIs('portal.auditlogs.*') ? 'active' : '' }}">
                                    <a href="{{ route('portal.auditlogs.index') }}" class="nav-link">
                                        <span class="sidebar-icon">
                                            <svg class="icon icon-sm me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="sidebar-text">{{ __('Journal Connexion') }}</span>
                                    </a>
                                </li>
                                @endcanany

                                @canany('cabinets.view', 'membre-du-cabinets.view')

                                <li class="nav-item">
                                    <span class="nav-link d-flex justify-content-between align-items-center {{ $request->routeIs('portal.membre-du-cabinets.index') || $request->routeIs('portal.cabinets.index') ? 'collapse' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#submenu-cabinet"><span>
                                            <span class="sidebar-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon icon-sm">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.5 9.5v10A2.5 2.5 0 006 22h12a2.5 2.5 0 002.5-2.5v-10M3.5 9.5L12 4l8.5 5.5M12 4v12" />
                                                </svg>


                                            </span>
                                            <span class="sidebar-text">{{ __('Cabinet') }}</span>
                                        </span>
                                        <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="multi-level collapse {{ $request->routeIs('portal.membre-du-cabinets.index') || $request->routeIs('portal.cabinets.index') ? 'show' : '' }}" role="list" id="submenu-cabinet" aria-expanded="{{ $request->routeIs('portal.membre-du-cabinets.index') || $request->routeIs('portal.cabinets.index') ? 'false' : 'true' }}">
                                        <ul class="flex-column nav">
                                            @can('cabinets.view')
                                            <li class="nav-item {{ $request->routeIs('portal.cabinets.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.cabinets.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">D</span> <span class="sidebar-text">{{ __('Tous les cabinets') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('membre-du-cabinets.view')
                                            <li class="nav-item {{ $request->routeIs('portal.membre-du-cabinets.index') ? 'active' : '' }}">
                                                <a href="{{ route('portal.membre-du-cabinets.index') }}" class="nav-link">
                                                    <span class="sidebar-text-contracted">R</span> <span class="sidebar-text">{{ __('Membres Cabinets') }}</span>
                                                </a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcanany

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
                                        <span class="sidebar-text">{{ __('Support') }}
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
        <div class="simplebar-scrollbar" style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;">
        </div>
    </div>
</nav>