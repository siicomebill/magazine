<li class="nav-item dropdown pr-4">

    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
  
      <img class="img-avatar" src="{{ backpack_avatar_url(backpack_auth()->user()) }}" alt="{{ backpack_auth()->user()->name }}">
  
    </a>
  
    <div class="dropdown-menu {{ config('backpack.base.html_direction') == 'rtl' ? 'dropdown-menu-left' : 'dropdown-menu-right' }} mr-4 pb-1 pt-1">
  
      <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="la la-user"></i> {{ trans('backpack::base.my_account') }}</a>

      <a class="dropdown-item" href="{{ route('backpack.dashboard') }}"><i class="la la-coffee"></i> {{ trans('backpack::base.dashboard') }}</a>
  
      {{-- <div class="dropdown-divider"></div>

      <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
        <button type="submit">
            <i class="la la-lock"></i>
            {{ trans('backpack::base.logout') }}
        </button>
      </form> --}}
  
    </div>
  
  </li>