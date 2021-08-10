<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <span class="simple-text logo-normal">
      {{ __('PFE ') }}
    </span>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      {{-- <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <span class="sidebar-mini"> UP </span>
          <span class="sidebar-normal">{{ __('User profile') }} </span>
        </a>
      </li> --}}


      <li class="nav-item{{ $activePage == 'clientindex' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('clients.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Client List') }}</p>
        </a>
      </li>

   

      


      @if (auth()->user()->role == 2)
      <li class="nav-item{{ $activePage == 'Reservation' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('Reservation.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Reservation List') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'Intervention' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('Intervention.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Intervention Demande ') }}</p>
        </a>
      </li>

      <li class="nav-item {{ ($activePage == 'roomindex' || $activePage == 'roomadd') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#rooms" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Rooms') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="rooms">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'roomindex' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('rooms.index') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Rooms list') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'roomadd' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('rooms.add') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Room add') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ ($activePage == 'roomindex' || $activePage == 'roomadd') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#extra" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Extra') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="extra">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'extra' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('Extra.index') }}">
                <i class="material-icons">content_paste</i>
                  <p>{{ __('Extra Menu') }}</p>
              </a>
            </li>


            <li class="nav-item{{ $activePage == 'extralist' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('extra.list') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Extra Demande') }} </span>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'extraaad' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('extra.add') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Extra add') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>


      <li class="nav-item {{ ($activePage == '' || $activePage == '') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#SpaResto" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('SpaResto') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="SpaResto">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'SpaResto' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('SpaResto.index') }}">
                <i class="material-icons">content_paste</i>
                  <p>{{ __('SpaResto Menu') }}</p>
              </a>
            </li>


            <li class="nav-item{{ $activePage == 'SpaRestoaad' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('SpaResto.add') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('SpaResto add') }} </span>
              </a>
            </li>


            <li class="nav-item{{ $activePage == 'spares' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('spa.res') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('SpaResto reservation') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      @endif


      @if(auth()->user()->role == 1)
      <li class="nav-item {{ ($activePage == 'hotelindex' || $activePage == 'hoteladd') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#hotel" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Hotels') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="hotel">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'hotelindex' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('hotel.index') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Hotel list') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'hoteladd' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('hotel.add') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Hotel add') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ ($activePage == 'adminindex' || $activePage == 'adminadd') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('admins') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="admin">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'adminindex' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.index') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('admin list') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'adminadd' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.add') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('admin add') }} </span>
              </a>
            </li>
          </ul>
        </div>

      </li>

@endif



    </ul>
  </div>
</div>
