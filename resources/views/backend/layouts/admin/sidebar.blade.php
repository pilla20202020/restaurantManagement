<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="{{ route('dashboard.index') }}" class="waves-effect">
                        <i class="icon-accelerator"></i> <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('customer.index') }}" class="waves-effect">
                        <i class="icon-paper-sheet"></i><span> Customer </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('foodmenu.index') }}" class="waves-effect">
                        <i class="icon-paper-sheet"></i><span> Food Menu </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('order.index') }}" class="waves-effect">
                        <i class="icon-paper-sheet"></i><span> Order </span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('setting.index') }}" class="waves-effect">
                        <i class="ti-settings"></i><span> Setting </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
