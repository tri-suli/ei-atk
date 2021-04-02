<div class="menu_section">
    <h3>Menu</h3>
    <ul class="nav side-menu">
        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
        <li>
            <a><i class="fa fa-edit"></i> Master <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{ route('itypes') }}">Item Type</a></li>
            </ul>
        </li>
    </ul>
</div>
