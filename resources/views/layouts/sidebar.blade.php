<div id="sidebar-menu">
    <ul>
        <li>
            <a href="#" class="waves-effect">
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
            <a href="#" class="waves-effect">
                <i class="mdi mdi-format-list-bulleted"></i>
                <span> Alat & Item</span>
            </a>
        </li>
        <li>
            <a href="#" class="waves-effect">
                <i class="mdi mdi-apps"></i>
                <span> Rak</span>
            </a>
        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table"></i><span>
                    Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li><a href="#">Pembelian</a></li>
                <li><a href="#">Penjualan</a></li>
            </ul>
        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i><span>
                    Laporan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li><a href="#">Pembelian</a></li>
                <li><a href="#">Penjualan</a></li>
            </ul>
        </li>
    </ul>
</div>
