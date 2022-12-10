<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/images/brand/logo-2.png') }}" class="header-brand-img desktop-logo"
                    alt="logo" height="60">
                <img src="{{ asset('assets/images/brand/logo-2.png') }}" class="header-brand-img toggle-logo"
                    alt="logo" height="60">
                <img src="{{ asset('assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo"
                    alt="logo" height="60">
                <img src="{{ asset('assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo1"
                    alt="logo" height="60">

            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>

                @if (in_array(Auth()->user()->role, [1, 2]))
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('dashboard') }}"><i
                                class="side-menu__icon fe fe-home"></i><span
                                class="side-menu__label">Dashboard</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.appointments') }}"><i
                                class="side-menu__icon fe fe-clipboard"></i><span
                                class="side-menu__label">Appointments</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.schedule') }}"><i
                                class="side-menu__icon fe fe-calendar"></i><span
                                class="side-menu__label">Schedule</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"
                            href="{{ route('admin.medical-records.index') }}"><i
                                class="side-menu__icon fe fe-book-open"></i><span class="side-menu__label">Medical
                                Records</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.transactions') }}"><i
                                class="side-menu__icon fe fe-book"></i><span
                                class="side-menu__label">Transactions</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.staff.index') }}"><i
                                class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Staff</span></a>
                    </li>
                    @if (Auth()->user()->role == 1)
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide"
                                href="{{ route('admin.dentist.index') }}"><i
                                    class="side-menu__icon fe fe-users"></i><span
                                    class="side-menu__label">Co-Dentist</span></a>
                        </li>
                    @endif

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.services.index') }}"><i
                                class="side-menu__icon fe fe-truck"></i><span
                                class="side-menu__label">Services</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.patients') }}"><i
                                class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">Patients</span></a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"
                            href="{{ route('admin.reports.medical', 'today') }}"><i
                                class="side-menu__icon fa fa-bar-chart"></i><span
                                class="side-menu__label">Reports</span></a>
                    </li>
                @elseif (Auth()->user()->role == 3)
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('staff.services.index') }}"><i
                                class="side-menu__icon fe fe-truck"></i><span
                                class="side-menu__label">Services</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"
                            href="{{ route('staff.medical-record.index') }}"><i
                                class="side-menu__icon fe fe-book-open"></i><span class="side-menu__label">Medical
                                Records</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('staff.schedules') }}"><i
                                class="side-menu__icon fe fe-calendar"></i><span
                                class="side-menu__label">Schedule</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"
                            href="{{ route('staff.invoices.index') }}"><i
                                class="side-menu__icon fa fa-clipboard"></i><span
                                class="side-menu__label">Invoices</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"
                            href="{{ route('admin.official-receipts.index') }}"><i
                                class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Official
                                Reciept</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"
                            href="{{ route('staff.transactions.index') }}"><i
                                class="side-menu__icon fe fe-book"></i><span
                                class="side-menu__label">Transactions</span></a>
                    </li>
                @else
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('patients.services') }}"><i
                                class="side-menu__icon fe fe-truck"></i><span
                                class="side-menu__label">Services</span></a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"
                            href="{{ route('patients.appointment') }}"><i
                                class="side-menu__icon fe fe-clipboard"></i><span
                                class="side-menu__label">Appointment</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"
                            href="{{ route('patients.schedules') }}"><i
                                class="side-menu__icon fe fe-calendar"></i><span
                                class="side-menu__label">Schedule</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('patients.dentist') }}"><i
                                class="side-menu__icon fa fa-user"></i><span
                                class="side-menu__label">Dentist</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"
                            href="{{ route('patients.invoices.index') }}"><i
                                class="side-menu__icon fa fa-clipboard"></i><span
                                class="side-menu__label">Invoices</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"
                            href="{{ route('patients.official-receipts.index') }}"><i
                                class="side-menu__icon fa fa-list"></i>
                            <span class="side-menu__label">
                                Official Reciept
                            </span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"
                            href="{{ route('patients.transactions') }}"><i
                                class="side-menu__icon fe fe-book"></i><span
                                class="side-menu__label">Transactions</span></a>
                    </li>
                @endif
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('logout') }}"><i
                            class="side-menu__icon fe fe-power"></i><span class="side-menu__label">logout</span></a>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>
