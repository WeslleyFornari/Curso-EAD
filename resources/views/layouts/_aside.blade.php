<div class="sidenav-header mb-4">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="{{asset('assets/img/perpetuo.png')}}" class="navbar-brand-img" alt="main_logo">
        <span class="ms-1 font-weight-bold"></span>
      </a>
</div>
    

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
       
      @include('layouts.aside._'.Auth::user()->role)
      </ul>
    </div>
    