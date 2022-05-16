<div class="home-container">
    <nav id="sidebar" class="sidebar soreco-bg active">
        <div class="sidebar-header">
            <img class="soreco-logo" src="{{ asset('images/SORSOGON II ELECTRIC COOPERATIVE .png') }} ">
            <img class="stet-logo" src="{{ asset('images/SORSOGON II ELECTRIC COOPERATIVE .png') }} ">
        </div>

        <ul class="nav-links">
            <li class="">
                <a class="{{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <i class="fa fa-home"></i>
                    <span class="link-name">Dashboard</span>
                </a>

                <ul class="sub-menu blank">
                    <li><a class="link-name" href="#">Dashboard</a></li>
                </ul>
            </li>

            <li class="">
                <a class="{{ Request::is('PsiSchedule') ? 'active' : '' }}" href="PsiSchedule">
                    <i class="fa fa-calendar-alt"></i>
                    <span class="link-name">Psi Schedule</span>
                </a>

                <ul class="sub-menu blank">
                    <li><a class="link-name" href="#">Psi Schedule</a></li>
                </ul>
            </li>
            {{-- <li class="">
                <a class="{{ Request::is('RequisitionVoucher') ? 'active' : '' }}" href="/RequisitionVoucher">
                    <i class="fa fa-file-alt"></i>
                    <span class="link-name">Requisition Voucher</span>
                </a>

                <ul class="sub-menu blank">
                    <li><a class="link-name" href="#">Requisition Voucher</a></li>
                </ul>
            </li> --}}


        </ul>
    </nav>
</div>
