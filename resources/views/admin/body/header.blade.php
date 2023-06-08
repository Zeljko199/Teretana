<header id="page-topbar" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo-sm" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="logo-dark" height="20">
                                </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo-sm-light" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="logo-light" height="20">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- App Search-->
            <form id="search-form" class="app-search d-none d-lg-block" action="{{ route('users.search', ['email'=>'email']) }}" method="GET" role="search">
                <div class="position-relative row">
                    <div class="col-md-9">
                    <input type="text" name="email" class="form-control" value="{{ Request ::get('search') }}" placeholder="Search...">
                    <span class="ri-search-line"></span>
                    </div>
                    <div class="col-md-3 d-flex flex-row">
                    <button class="dugmePretraga" style="border-radius: 12px" type="submit">Pretraži</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="d-flex">
            @php
                $id = Auth::user()->id;
                $adminData = App\Models\User::find($id);
            @endphp
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ (!empty($adminData->profile_image))? url('image/admin_images/'.$adminData->profile_image):url('image/admin_images/avatar.png') }}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ $adminData->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ri-user-line align-middle me-1"></i> Profil</a>
                    <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My Wallet</a>
                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="ri-settings-2-line"></i>
                </button>
            </div>
        </div>
    </div>
</header>
<script>
    document.getElementById('search-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Zaustavi podrazumevano slanje forme

        // Izvrši željenu akciju ili direktno preusmerenje na putanju za pretragu
        this.submit(); // Ponovo pokreni slanje forme
    });
</script>
