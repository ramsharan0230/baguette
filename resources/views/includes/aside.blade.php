<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    @if(Auth::user()->role->slug=='hygiene')
                    <a href="{{ route('inspection.index') }}"><i class="menu-icon fa fa-laptop"></i>Hygiene Dashboard </a>
                    @endif
                </li>
                <li class="menu-item-has-children dropdown show">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="menu-icon fa fa-bar-chart"></i>Reports</a>
                    <ul class="sub-menu children dropdown-menu show">
                        <li><i style="color:red" class="menu-icon fa fa-file-pdf-o"></i><a href="{{ route('inspection.pdf.report.submitted') }}">Submitted(pdf)</a></li>
                        <li><i style="color:red" class="menu-icon fa fa-file-pdf-o"></i><a href="{{ route('inspection.pdf.report.unsubmitted') }}">Unsubmitted(pdf)</a></li>
                        <li><i style="color:green" class="menu-icon fa fa-file-excel-o"></i><a href="{{ route('inspection.excel.report.submitted') }}">Submitted(excel)</a></li>
                        <li><i style="color:green" class="menu-icon fa fa-file-excel-o"></i><a href="{{ route('inspection.excel.report.unsubmitted') }}">Unsubmitted(excel)</a></li>
                    </ul>
                </li>

                @if(Auth::user()->role->slug == "SrOpManager")
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{ route('sropmanager.users') }}">Lists</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>