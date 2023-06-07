<nav class="navbar navbar-dark bg-transparent">
    <div class="container-fluid">
      <a class="navbar-brand" href="/posts">
        <img src="/img/logo.png" alt="Logo" width="50"class="d-inline">
        <h4 class="text-dark d-inline" style="vertical-align: -webkit-baseline-middle;">UNJA LAPOR HILANG</h4>
      </a>
      <button class="navbar-toggler toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation" style="position: absolute; top: 0; right:0;">
        <span class="fa-solid fa-bars fa-xl py-3" style="color: #000000;"></span>
      </button>
      <div class="offcanvas offcanvas-end toggle" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          @auth
          <form action="/logout" method="POST">
            @csrf
            <button class="nav-link text-decoration-none text-black" style="font-weight: 400;"><i class="fa-solid fa-right-from-bracket fa-md"></i>&nbsp;&nbsp;Logout</button>
          </form>
          @else
          <a href="/login" class="offcanvas-title nav-link" id="offcanvasDarkNavbarLabel" style="font-weight: 400;"><i class="fa-solid fa-right-to-bracket fa-md"></i> &nbsp;&nbsp;Login</a>
          @endauth
          
        </div>
        <div class="offcanvas-body text-end">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            @can('user')
            <li class="nav-item d-flex align-items-center justify-content-end">
              <a href="/dashboard" style="width: 100%;" class="nav-link">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-10">
                    <div class="card-body">
                      <h6 class="card-title d-flex justify-content-start" style="width: max-content;">Postingan Saya</h6>
                    </div>
                  </div>  
                  <div class="col-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-file-lines fa-2xl"></i>
                  </div>
                </div>
              </div>
              </a>
            </li>
            <li class="nav-item d-flex align-items-center justify-content-end">
              <a href="/klaim" style="width: 100%;" class="nav-link">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-10">
                    <div class="card-body">
                      <h6 class="card-title d-flex justify-content-start" style="width: max-content;">Klaim Saya</h6>
                    </div>
                  </div>  
                  <div class="col-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-hand fa-2xl"></i>
                  </div>
                </div>
              </div>
              </a>
            </li>
            @endcan
            <fieldset>
            <legend class="fs-5">Kategori</legend>
            <li class="nav-item d-flex align-items-center justify-content-end">
              <a href="/posts?category=perangkat-elektronik" style="width: 100%;" class="nav-link">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-10">
                    <div class="card-body">
                      <h6 class="card-title d-flex justify-content-start" style="width: max-content;">Perangkat Elektronik</h6>
                    </div>
                  </div>  
                  <div class="col-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-tablet fa-2xl"></i>
                  </div>
                </div>
              </div>
              </a>
            </li>
            <li class="nav-item d-flex align-items-center justify-content-end">
              <a href="/posts?category=perhiasan" style="width: 100%;" class="nav-link">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-10">
                    <div class="card-body">
                      <h6 class="card-title d-flex justify-content-start">Perhiasan</h6>
                    </div>
                  </div>
                  <div class="col-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-gem fa-2xl"></i>
                  </div>
                </div>
              </div>
              </a>
            </li>
            <li class="nav-item d-flex align-items-center justify-content-end">
              <a href="/posts?category=dokumen-penting" style="width: 100%;" class="nav-link">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-10">
                    <div class="card-body">
                      <h6 class="card-title d-flex justify-content-start">Dokumen Penting</h6>
                    </div>
                  </div>
                  <div class="col-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-wallet fa-2xl"></i>
                  </div>
                </div>
              </div>
              </a>
            </li>
          </fieldset>
          
          @can('admin')     
          <fieldset>
              <legend class="fs-5">Administrator</legend>
              <li class="nav-item d-flex align-items-center justify-content-end">
                <a href="/klaims" style="width: 100%;" class="nav-link">
                <div class="card mb-3">
                  <div class="row g-0">
                    <div class="col-10">
                      <div class="card-body">
                        <h6 class="card-title d-flex justify-content-start" style="width: max-content;">Pengajuan Klaim</h6>
                      </div>
                    </div>  
                    <div class="col-2 d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-hand fa-2xl"></i>
                    </div>
                  </div>
                </div>
                </a>
              </li>
          </fieldset>
          @endcan  
          </ul>
        </div>
        
       @auth
       <div class="user" style="padding-top: 5%">
       <a class="fs-5 offcanvas-title nav-link text-end" id="offcanvasDarkNavbarLabel" style="font-weight: 400;margin-bottom:10%; margin-right:5%;">{{ auth()->user()->name }} &nbsp; <i class="fa-solid fa-circle-user fa-2xl"></i></a>
       @endauth
      </div>
      </div>
    </div>
  </nav>


