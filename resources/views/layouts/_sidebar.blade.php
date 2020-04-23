  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        @admin('super,editor,writer')
        <li class="{{(Request::segment(2) == 'dashboard' ? 'active' : '')}}">
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-dashboard"></i><span>{{ __('Dashboard')}}</span>
          </a>
        </li>
        <li class="treeview {{(Request::segment(2) == 'artikel' || Request::segment(2) == 'kategori' ? 'active' : '')}}">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span> {{ __('Artikel')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::segment(2) == 'artikel' ? 'active' : '')}}">
              <a href="{{ route('artikel.index') }}">
                <i class="fa fa-circle-o"></i> {{ __('Semua Artikel')}}
              </a>
            </li>
            <li class="{{(Request::segment(2) == 'artikel' && Request::segment(3) == 'create' ? 'active' : '')}}">
              <a href="{{ route('artikel.create') }}">
                <i class="fa fa-circle-o"></i> {{ __('Buat Artikel')}}
              </a>
            </li>
            @admin('super,editor')
            <li class="{{(Request::segment(2) == 'kategori' ? 'active' : '')}}">
              <a href="{{ route('kategori.index') }}">
                <i class="fa fa-circle-o"></i> {{ __('Kategori')}}
              </a>
            </li>
            @endadmin
          </ul>
        </li>
        @admin('super,editor')
        <li class="treeview {{(Request::segment(2) == 'halaman' ? 'active' : '')}}">
          <a href="#">
            <i class="fa fa-clone"></i> <span> {{ __('Halaman')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::segment(2) == 'halaman' ? 'active' : '')}}">
              <a href="{{route('halaman.index')}}">
                <i class="fa fa-circle-o"></i> {{ __('Semua Halaman')}}
              </a>
            </li>
            <li class="{{(Request::segment(2) == 'halaman' && Request::segment(3) == 'create' ? 'active' : '')}}">
              <a href="{{route('halaman.create')}}">
                <i class="fa fa-circle-o"></i> {{ __('Buat Halaman')}}
              </a>
            </li>
          </ul>
        </li>
        @endadmin
        <li class="{{(Request::segment(2) == 'komentar' ? 'active' : '')}}">
          <a href="{{route('komentar.index')}}">
            <i class="fa fa-comments"></i><span>{{ __('Komentar')}}</span>
          </a>
        </li>
        @admin('super,editor')
        <li class="treeview {{(Request::segment(2) == 'tema' || Request::segment(2) == 'menu' ? 'active' : '')}}">
          <a href="#">
            <i class="fa fa-object-ungroup"></i> <span> {{ __('Tampilan')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::segment(2) == 'tema' ? 'active' : '')}}">
              <a href="{{route('tema.index')}}">
                <i class="fa fa-circle-o"></i> {{ __('Tema')}}
              </a>
            </li>
            <li class="{{(Request::segment(2) == 'menu' ? 'active' : '')}}">
              <a href="{{route('menu.index')}}">
                <i class="fa fa-circle-o"></i> {{ __('Menu Manager')}}
              </a>
            </li>
          </ul>
        </li>
        @endadmin
        @admin('super')
        <li class="treeview {{(Request::segment(2) == 'users' ? 'active' : '')}}">
          <a href="#">
            <i class="fa fa-users"></i> <span> {{ __('Pengguna')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::segment(2) == 'users' && Request::segment(3) == 'show' ? 'active' : '')}}">
              <a href="{{route('admin.show')}}">
                <i class="fa fa-circle-o"></i> {{ __('Semua Pengguna')}}
              </a>
            </li>
            <li class="{{(Request::segment(2) == 'users' && Request::segment(3) == 'register' ? 'active' : '')}}">
              <a href="{{route('admin.register')}}">
                <i class="fa fa-circle-o"></i> {{ __('Tambah Pengguna')}}
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview {{(Request::segment(2) == 'pengaturan' ? 'active' : '')}}">
          <a href="#">
            <i class="fa fa-sliders"></i> <span> {{ __('Pengaturan')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::segment(2) == 'pengaturan' && Request::segment(3) == 'umum' ? 'active' : '')}}">
              <a href="{{route('umum.index')}}">
                <i class="fa fa-circle-o"></i> {{ __('Umum')}}
              </a>
            </li>
            <li class="{{(Request::segment(2) == 'pengaturan' && Request::segment(3) == 'icon' ? 'active' : '')}}">
              <a href="{{route('icon.index')}}">
                <i class="fa fa-circle-o"></i> {{ __('Icon')}}
              </a>
            </li>
            <li class="{{(Request::segment(2) == 'pengaturan' && Request::segment(3) == 'postingan' ? 'active' : '')}}">
              <a href="{{route('postingan.index')}}">
                <i class="fa fa-circle-o"></i> {{ __('Postingan')}}
              </a>
            </li>
            <li class="{{(Request::segment(2) == 'pengaturan' && Request::segment(3) == 'comment' ? 'active' : '')}}">
              <a href="{{route('comment.index')}}">
                <i class="fa fa-circle-o"></i> {{ __('Komentar')}}
              </a>
            </li>
            <li class="{{(Request::segment(2) == 'pengaturan' && Request::segment(3) == 'email' ? 'active' : '')}}">
              <a href="{{route('email.index')}}">
                <i class="fa fa-circle-o"></i> {{ __('Email')}}
              </a>
            </li>
          </ul>
        </li>
        @endadmin
        @endadmin
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>