<div id="sidebar-menu">
    <ul>
        <li class="menu-title">
            @if (Auth::user()->roles == 'Purchasing')
                <span class="badge badge-secondary">{{ Auth::user()->roles }}</span>
            @elseif(Auth::user()->roles == 'Sales')
                <span class="badge badge-warning">{{ Auth::user()->roles }}</span>
            @elseif(Auth::user()->roles == 'Gudang')
                <span class="badge badge-info">{{ Auth::user()->roles }}</span>
            @endif
        </li>
        <li>
            <a href="{{ route('dashboard') }}"
                class="waves-effect {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
                <i class="mdi mdi-airplay"></i>
                <span> Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.index') }}"
                class="waves-effect {{ Request::segment(1) == 'user' ? 'active' : '' }}">
                <i class="mdi mdi-face-profile"></i>
                <span> User</span>
            </a>
        </li>
        <li>
            <a href="{{ route('supplier.index') }}"
                class="waves-effect {{ Request::segment(1) == 'supplier' ? 'active' : '' }}">
                <i class="mdi mdi-chemical-weapon"></i>
                <span> Vendor</span>
            </a>
        </li>
        <li>
            <a href="{{ route('item.index') }}"
                class="waves-effect {{ Request::segment(1) == 'item' ? 'active' : '' }}">
                <i class="mdi mdi-format-list-bulleted"></i>
                <span> Item & Tools</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rak.index') }}"
                class="waves-effect {{ Request::segment(1) == 'rak' ? 'active' : '' }}">
                <i class="mdi mdi-apps"></i>
                <span> Rak</span>
            </a>
        </li>
        <li class="has_sub {{ Request::segment(1) == 'receive' ? 'nav-active' : '' }}">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="mdi mdi-table"></i><span>Transaksi </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
            </a>
            <ul class="list-unstyled">
                <li class="{{ Request::segment(1) == 'receive' ? 'active' : '' }}"><a
                        href="{{ route('receive.index') }}">Request</a></li>
                <li class="{{ Request::segment(1) == 'pengeluaran' ? 'active' : '' }}"><a
                        href="{{ route('pengeluaran.index') }}">Order</a></li>
            </ul>
        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i><span>
                    Laporan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li><a href="{{ route('report.penerimaan') }}">Request</a></li>
                <li><a href="{{ route('report.rep_pengeluaran') }}">Pengeluaran</a></li>
                {{-- <li><a href="{{ route('report.sales') }}">Sales</a></li> --}}
                <li><a href="{{ route('report.rep_item') }}">Persediaan Item</a></li>
            </ul>
        </li>
    </ul>
</div>
