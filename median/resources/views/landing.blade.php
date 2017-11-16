@extends('template')

@section('content')

<!-- Page Header -->
<header class="masthead">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="jumbotron pb-0 text-center" id="landing-jumbo">

                    @if(session()->has('newsletter_message.level'))
                    <div class="mx-auto alert alert-{{ session('newsletter_message.level') }}" style="width:370px;"> 
                        <small>{!! session('newsletter_message.content') !!}</small>
                    </div>
                    @endif
                    <div style="height: 50px;"></div>
                    <h1 class="text-white mt-5" id="StartSharing">
                        Share now!
                    </h1>
                    <p class="text-white d-sm-block">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.
                    </p>
                    <p class="">
                        <a class="btn btn-primary btn-md" href="#about" role="button">Learn more</a>
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
</header>

{{-- some text plcholder --}}
<div class="container text-center" id="landing-text-pholder">
    <blockquote class="blockquote">
        <p class="mb-0">
            The soul is, so to speak, the first principle of living things. We seek to contemplate and know its nature and substance.
        </p>
        <footer class="blockquote-footer"><span>Aristotle</span> in <cite title="Hugh Lawson-Tancred">De Anima (On the Soul)</cite></footer>
    </blockquote>
</div>

{{-- landing-4 --}}
<div id="landing-4">
    <div class="landing-4-pholder"></div>
</div>

{{-- meet the team --}}
<div class="container text-center" id="teammate">
    <h3>The Leaders</h3><br>
    <div class="row">
        <div class="col-12 col-sm-4">
            <div class="card card-teammate">
                <img class="card-img-top" src="{{ asset('img/teammate1.jpg') }}" alt="teammate_img">
                <div class="card-body">
                    <p class="card-text executives"><span>Hannibal Lecter</span> <br>Executive Chairman</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card card-teammate">
                <img class="card-img-top" src="{{ asset('img/teammate2.jpg') }}" alt="teammate_img">
                <div class="card-body">
                    <p class="card-text executives"><span>Mason Verger</span> <br>President</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card card-teammate">
                <img class="card-img-top" src="{{ asset('img/teammate3.jpg') }}" alt="teammate_img">
                <div class="card-body">
                    <p class="card-text executives"><span>Karl Marx</span> <br>Chief Strategy Officer</p>
                </div>
            </div>
        </div>
    </div>
</div>

<hr width="50%">
<!-- carousel items -->
<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="container">
                    <div class="card p-3" id="landing-card">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="card-block">
                                    <h3 class="card-title">Curabitur gravida vestibulum</h3>
                                    <p class="card-text">Cras convallis ut turpis vitae facilisis. Morbi eu augue vel quam efficitur rhoncus vitae eget lectus. Cras augue ligula, aliquam ut enim ut, feugiat imp.
                                    </p>
                                    <a href="#" class="btn-link"><small>Read More</small></a>
                                </div>
                            </div>
                            <div class="d-none d-sm-block col-sm-6">
                                <div class="card-img-bottom">
                                    <img class="d-block img-fluid" src="{{ asset('img/landing-1.jpg') }}" alt="alt-carousel">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="card p-3" id="landing-card">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="card-block">
                                    <h3 class="card-title">Excepteur sint occaec</h3>
                                    <p class="card-text">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit.
                                    </p>
                                    <a href="#" class="btn-link"><small>Read More</small></a>
                                </div>
                            </div>
                            <div class="d-none d-sm-block col-sm-6">
                                <div class="card-img-bottom">
                                    <img class="d-block img-fluid" src="{{ asset('img/landing-2.jpg') }}" alt="alt-carousel">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="card p-3" id="landing-card">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="card-block">
                                    <h3 class="card-title">Cirure dolor in reprehenderit</h3>
                                    <p class="card-text">Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur.
                                    </p>
                                    <a href="#" class="btn-link"><small>Read More</small></a>
                                </div>
                            </div>
                            <div class="d-none d-sm-block col-sm-6">
                                <div class="card-img-bottom">
                                    <img class="d-block img-fluid" src="{{ asset('img/landing-3.jpg') }}" alt="alt-carousel">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<script type="text/javascript">
    $('.carousel').carousel({
        pause: "hover"
    })
</script>
@endsection