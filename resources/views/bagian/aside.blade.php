  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('AdminLTE/img/avatar04.png') }}" class="img-circle"  alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{ route('user.home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Project</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('project.view') }}"><i class="fa fa-list"></i> Proyek Umum</a></li>
            <li><a href="{{ route('promo.view') }}"><i class="fa fa-percent"></i> Promo</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
            <span>Booking dan Penjualan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/customer')}}"><i class="fa fa-group"></i> Customer</a></li>
            <li><a href="{{url('/nup')}}"><i class="fa fa-file-o"></i>NUP</a></li>
            <li><a href="{{url('/booking-fee')}}"><i class="fa fa-money"></i>Booking Fee</a></li>
            <li><a href="{{url('/spr')}}"><i class="fa fa-file"></i>SPR</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i  class="fa fa-money" aria-hidden="true"></i>
            <span>Pembayaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('formpayment.view') }}"><i class="fa fa-bank"></i> Form Payment</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> KPR Payment</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> PBB Payment</a></li>
            <li><a href="{{ route('taxpayment.view') }}"><i class="fa fa-industry"></i> Tax Payment</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            <span>Perubahan Data Penjualan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('change-name.view') }}"><i class="fa fa-tag"></i> Ganti Nama</a></li>
          <li><a href="{{ route('movekavling.view') }}"><i class="fa fa-map-signs"></i> Pindah Kavling</a></li>
          <li><a href="{{ route('customervoid.view')}}"><i class="fa fa-ban"></i> Pembatalan</a></li>
         </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>Data KPR</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> KPR</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Complaint</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Cash Log</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Safekeeping</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> LPA</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>Akad Kredit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('interview.view')}}"><i class="fa ion-ios-calendar"></i>Inteview Schedule</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Jadwal Akad Kredit</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-map" aria-hidden="true"></i>
            <span>Marketing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Legalitas kavling</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Legalitas akad</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">

            <i class="fa fa-file-text-o"></i> <span>Report</span>
           </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Users</span>
          </a>
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
