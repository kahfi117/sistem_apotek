 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!-- User details -->


         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Dashboard</li>

                 <li>
                     <a href="{{ url('/dashboard') }}" class="waves-effect">
                         <i class="ri-home-fill"></i>
                         <span>Dashboard</span>
                     </a>
                 </li>
                 @if (Auth::user()->role == 'admin')
                     <li class="menu-title">Main Menu</li>

                     <li>
                         <a href="{{ route('supplier.all') }}" class="waves-effect">
                             <i class="ri-hotel-fill"></i>
                             <span>Kelola Data Supplier</span>
                         </a>
                     </li>


                     <li>
                         <a href="javascript: void(0);" class="has-arrow waves-effect">
                             <i class="ri-oil-fill"></i>
                             <span>Kelola Obat Masuk</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li><a href="{{ route('purchase.all') }}">Data Obat Masuk</a></li>
                             <li><a href="{{ route('daily.purchase.report') }}">Laporan Obat Masuk</a></li>
                         </ul>
                     </li>

                     <li>
                         <a href="javascript: void(0);" class="has-arrow waves-effect">
                             <i class="ri-compass-2-fill"></i>
                             <span>Kelola Obat Keluar</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li><a href="{{ route('invoice.all') }}">Data Obat Keluar</a></li>
                             <li><a href="{{ route('daily.invoice.report') }}">Laporan Obat Keluar</a></li>

                         </ul>
                     </li>

                     <li class="menu-title">Stock</li>

                     <li>
                         <a href="javascript: void(0);" class="has-arrow waves-effect">
                             <i class="ri-gift-fill"></i>
                             <span>Manage Stock</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li><a href="{{ route('stock.report') }}">Stock Report</a></li>
                             <li><a href="{{ route('stock.supplier.wise') }}">Supplier / Kategori </a></li>

                         </ul>
                     </li>

                     <li class="menu-title">Master Data</li>

                     <li>
                         <a href="{{ route('unit.all') }}" class="waves-effect">
                             <i class="ri-delete-back-fill"></i>
                             <span>Kelola Jenis</span>
                         </a>
                     </li>

                     <li>
                         <a href="{{ route('category.all') }}" class="waves-effect">
                             <i class="ri-apps-2-fill"></i>
                             <span>Kelola Kategori</span>
                         </a>
                     </li>

                     <li>
                         <a href="{{ route('product.all') }}" class="waves-effect">
                             <i class="ri-reddit-fill"></i>
                             <span>Kelola Data Obat</span>
                         </a>
                     </li>

                     <li class="menu-title">User Management</li>

                     <li>
                         <a href="{{ route('user.index') }}" class="waves-effect">
                             <i class="ri-user-line"></i>
                             <span>Kelola Data User</span>
                         </a>
                     </li>
                 @else
                     <li class="menu-title">Menu Laporan</li>

                     <li>
                         <a href="javascript: void(0);" class="has-arrow waves-effect">
                             <i class="ri-gift-fill"></i>
                             <span>Laporan Stock</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li><a href="{{ route('stock.report') }}">Laporan Stock Full</a></li>
                             <li><a href="{{ route('stock.supplier.wise') }}">Supplier / Kategori </a></li>

                         </ul>
                     </li>
                     <li>
                         <a href="javascript: void(0);" class="has-arrow waves-effect">
                             <i class="ri-oil-fill"></i>
                             <span>Laporan Obat</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li><a href="{{ route('daily.purchase.report') }}">Laporan Obat Masuk</a></li>
                             <li><a href="{{ route('daily.invoice.report') }}">Laporan Obat Keluar</a></li>
                         </ul>
                     </li>
                 @endif
                 <li class="menu-title">Analisis</li>
                 <li>
                     <a href="{{ route('analisis.choose') }}" class="waves-effect">
                         <i class="ri-line-chart-line"></i>
                         <span>Analisis ABC</span>
                     </a>
                 </li>


             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
