<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('argon') }}/img/brand/Sprouts-By-Footprints-logo.png" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                                               
                        
                        @can('manage-sprouts', App\User::class)
                        <li class="nav-item {{ $elementName == 'sprout-management' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('sprouts.index') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-collection text-yellow"></i>
                                <span class="nav-link-text">{{ __('Sprouts') }}</span>
                            </a>
                        </li>
                        @endcan
                        @can('manage-users', App\User::class)
                        <li class="nav-item {{ $elementName == 'user-management' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.index') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-single-copy-04 text-blue"></i>
                                <span class="nav-link-text">{{ __('Users') }}</span>
                            </a>
                        </li>
                        @endcan
                        @can('manage-children', App\User::class)
                        <li class="nav-item {{ $elementName == 'children-management' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('childrens.index') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-ui-04 text-info"></i>
                                <span class="nav-link-text">{{ __('Children') }}</span>
                            </a>
                        </li>
                        @endcan
                        @can('manage-admission', App\User::class)
                        <li class="nav-item {{ $elementName == 'admission-management' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admissions.list') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-align-left-2 text-default"></i>
                                <span class="nav-link-text">{{ __('Fees') }}</span>
                            </a>
                        </li>
                        @endcan
                        @can('manage-fee-configuration', App\User::class)
                        <li class="nav-item {{ $elementName == 'fee-configuration' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('fees') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-settings-gear-65 text-default"></i>
                                <span class="nav-link-text">{{ __('Fee Configuration') }}</span>
                            </a>
                        </li>
                        @endcan

                        @can('manage-fooditem', App\User::class)
                        <li class="nav-item {{ $elementName == 'food-items-management' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('fooditems.index') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-sound-wave text-blue text-default"></i>
                                <span class="nav-link-text">{{ __('Food Items') }}</span>
                            </a>
                        </li>
                        @endcan

                        @can('manage-program', App\User::class)
                        <li class="nav-item {{ $elementName == 'program-management' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('programs.index') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="fa fa-tasks text-blue" aria-hidden="true"></i>
                                <span class="nav-link-text">{{ __('Programs') }}</span>
                            </a>
                        </li>
                        @endcan
                        
                        @can('manage-fee', App\User::class)
                        <!-- <li class="nav-item {{ $elementName == 'fee-management' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('fees') }}"  aria-expanded="" aria-controls="navbar-tables">                                
                                <i class="fa fa-cog text-blue" aria-hidden="true"></i>
                                <span class="nav-link-text">{{ __('Fee Configuration') }}</span>
                            </a>
                        </li> -->
                        @endcan

                        @can('manage-daily', App\User::class)
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                            <i class="fas fa-chart-line text-blue" aria-hidden="true" ></i>
                            <span class="nav-link-text">{{ __('Daily Updates') }}</span>
                            </a>
                            <div class="collapse show" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item {{ $elementName == 'food-activity-management' ? 'active' : '' }}">  
                                        <a href="{{ route('food_activities.index') }}" class="nav-link">{{ __('Food') }}</a>
                                    </li>
                                    <li class="nav-item {{ $elementName == 'daily-activity-management' ? 'active' : '' }}">
                                        <a href="{{ route('daily_activities.index') }}" class="nav-link">{{ __('Activities') }}</a>
                                    </li>                                   
                                    <li class="nav-item {{ $elementName == 'sleep-activity-management' ? 'active' : '' }}" >
                                        <a href="{{ route('sleep_activities.index') }}" class="nav-link">{{ __('Sleep') }}</a>
                                    </li>
                                    <li class="nav-item {{ $elementName == 'diaper-activity-management' ? 'active' : '' }}">
                                        <a href="{{ route('diaper_activities.index') }}" class="nav-link">{{ __('Diaper') }}</a>
                                    </li>                                    
                                </ul>
                            </div>
                        </li>
                        @endcan

                        <li class="nav-item {{ $elementName == 'enquiry-management' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('enquiries.index') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-ui-04 text-blue"></i>
                                <span class="nav-link-text">{{ __('Enquiry') }}</span>
                            </a>
                        </li>
                        
                        @can('view-due-payments', App\User::class)
                        <li class="nav-item {{ $elementName == 'payment-due' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('payment-due.index') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-money-coins text-blue"></i>
                                <span class="nav-link-text">{{ __('Due Payments') }}</span>
                            </a>
                        </li>
                        @endcan
                        @can('manage-cctv', App\User::class)
                        <li class="nav-item {{ $elementName == 'cctv-management' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('cctv.create') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-camera-compact text-blue"></i>
                                <span class="nav-link-text">{{ __('CCTVs') }}</span>
                            </a>
                        </li>
                        @endcan

                        @can('manage-collection', App\User::class)
                        <li class="nav-item {{ $elementName == 'transactions' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('transactions.index') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-money-coins text-blue"></i>
                                <span class="nav-link-text">{{ __('Collections') }}</span>
                            </a>
                        </li>
                        @endcan
                        <!-- <li class="nav-item {{ $elementName == 'attendance-management' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('attendances.index') }}"  aria-expanded="" aria-controls="navbar-tables">
                                <i class="ni ni-calendar-grid-58 text-blue"></i>
                                <span class="nav-link-text">{{ __('Attendance') }}</span>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </nav>