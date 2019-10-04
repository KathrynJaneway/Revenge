<div class="nav row col-12">

    <div class="col-8 col-xl-8 index-befor">
        <a class="" href="{{ url('/') }}">
            {{ config('app.name', 'Saphira') }} <i class="fa fa-diamond"></i>
        </a>
    </div>

    <div class="col-4 col-xl-4 pull-right text-right index-befor">

        <a href="#" id="nav-header"> {{ Auth::user()->name }}</a>

        <div class="display-non" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">Profil</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</div>


