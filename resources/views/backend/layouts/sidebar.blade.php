<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-file-text"></i>
                        </span>
                        <span class="pcoded-mtext">Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('expenses.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-align-justify"></i>
                        </span>
                        <span class="pcoded-mtext">Expense</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>