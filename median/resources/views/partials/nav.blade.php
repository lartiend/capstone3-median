@php
$path_avatar = '../img/avatar.png';
if ($path_avatar) {
    $path_avatar = '../../img/avatar.png';
}
if (!is_null(Auth::user())) {
    $settings = '/settings/'.Auth::user()->id;
}
@endphp





<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top mx-auto" id="mainNav">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ '/' }}">Median</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="/search">
                    <i class="fa fa-search" aria-hidden="true" style="color: grey!important"></i>
                </a>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link font-weight-normal" href="{{ route('login') }}" style="color: grey!important">
                    Sign in
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link get-started btn" href="{{ route('register') }}" style="color: grey!important">
                    Get started
                </a>
            </li>
            @else
            <div class="dropdown show">
                <a class="btn btn-sm btn-primary dropdown-toggle font-weight-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>
                        <div title="{{ Auth::user()->username }}" style="background-image: url({{$path_avatar}}); background-size: cover; width: 50px; height: 50px;">
                        </div>
                    </span>
                    <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <li><a title="Browse own article list" class="dropdown-item" href='{{url("profile/".Auth::id())}}'><i class="fa fa-fw fa-tachometer mr-2" aria-hidden="true"></i>My Publications</a></li>
                    <li><a title="Write a post" class="dropdown-item" href="/articles/create"><i class="fa fa-fw fa-pencil mr-2" aria-hidden="true"></i>Write Article</a></li>
                    <li><a title="See More Articles" class="dropdown-item" href="/articles"><i class="fa fa-fw fa-users mr-2" aria-hidden="true"></i>More Articles</a></li>
                    <li><a title="Interests" class="dropdown-item" href='{{url("interests/".Auth::id())}}'><i class="fa fa-fw fa-bookmark-o mr-2" aria-hidden="true"></i>Interests</a></li>
                    <li><a title="Setting" class="dropdown-item" href= {{ $settings }} ><i class="fa fa-fw fa-cogs mr-2" aria-hidden="true"></i>Setting</a></li>
                    <li><div class="dropdown-divider"></div></li>
                    @if(Auth::user()->role_id == 1)
                        <li><a title="Admin" class="dropdown-item" href='/admin' ><i class="fa fa-fw fa-object-group mr-2" aria-hidden="true"></i>Admin Panel</a></li>
                    @endif
                    <li><a title="Signout" class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-sign-out mr-2" aria-hidden="true"></i>Signout</a></li>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endguest
        </ul>
    </div>
</div>
</nav>
