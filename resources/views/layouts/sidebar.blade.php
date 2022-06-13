<div id="sidebar-menu">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="waves-effect">
                <i class="mdi mdi-airplay"></i>
                <span> Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.index') }}" class="waves-effect">
                <i class="mdi mdi-face-profile"></i>
                <span> User</span>
            </a>
        </li>
        <li>
            <a href="{{ route('vendor.index') }}" class="waves-effect">
                <i class="mdi mdi-chemical-weapon"></i>
                <span> Vendor</span>
            </a>
        </li>
        <li>
            <a href="{{ route('item.index') }}" class="waves-effect">
                <i class="mdi mdi-format-list-bulleted"></i>
                <span> Item & Tools</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rak.index') }}" class="waves-effect">
                <i class="mdi mdi-apps"></i>
                <span> Rak</span>
            </a>
        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table"></i><span>
                    Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li><a href="{{ route('receive.index') }}">Penerimaan</a></li>
                <li><a href="#">Pengeluaran</a></li>
            </ul>
        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i><span>
                    Laporan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li><a href="#">Penerimaan</a></li>
                <li><a href="#">Pengeluaran</a></li>
            </ul>
        </li>
    </ul>
</div>
