  <header id="page-topbar">
      <div class="navbar-header">
          <div class="d-flex">
              <!-- LOGO -->
              <div class="navbar-brand-box">
                  <a href="#" class="logo logo-dark">
                      <span class="logo-sm text-white">
                          Gisella Farma
                      </span>
                      <span class="logo-lg text-white">
                          {{-- <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="logo-dark" height="20"> --}}
                          Gisella Farma
                      </span>
                  </a>

                  <a href="#" class="logo logo-light">
                      <span class="logo-sm text-white">
                          <img src="{{ asset('logo/toko-rb.png') }}" alt="logo-sm-light"
                              height="40">
                      </span>
                      <span class="logo-lg text-white">
                        <img src="{{ asset('logo/toko-rb.png') }}" alt="logo-sm-light"
                        height="35">
                              Gisella Farma
                      </span>
                  </a>
              </div>

              <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                  id="vertical-menu-btn">
                  <i class="ri-menu-2-line align-middle"></i>
              </button>


          </div>

          <div class="d-flex">

{{--

              <div class="dropdown d-none d-lg-inline-block ms-1">
                  <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                      <i class="ri-fullscreen-line"></i>
                  </button>
              </div> --}}

              @php
                  $id = Auth::user()->id;
                  $adminData = App\Models\User::find($id);
              @endphp

              <div class="dropdown d-inline-block user-dropdown">
                  <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img class="rounded-circle header-profile-user"
                          src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                          alt="Header Avatar">
                      <span class="d-none d-xl-inline-block ms-1">{{ $adminData->name }}</span>
                      <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="{{ route('change.password') }}"><i
                              class="ri-wallet-2-line align-middle me-1"></i> Change Password</a>

                      <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i
                              class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                  </div>
              </div>



          </div>
      </div>
  </header>
