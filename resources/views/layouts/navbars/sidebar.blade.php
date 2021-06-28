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

      <li class="nav-item{{ $activePage == 'Reservation' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('Reservation.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Reservation List') }}</p>
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
                  <p>{{ __('Extra List') }}</p>
              </a>
            </li>


            <li class="nav-item{{ $activePage == 'extralist' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('extra.list') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Extra Menu') }} </span>
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













      {{-- <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="{{ route('upgrade') }}">
          <i class="material-icons text-white">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> --}}
    </ul>
  </div>
</div>
