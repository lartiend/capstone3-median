@extends('template')

@section('content')
<div class="container" id="wrapper">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="panel ">

@if(session()->has('newsletter_message.level'))
<div class="mx-auto alert alert-{{ session('newsletter_message.level') }}" style="width:300px;"> 
<small>{!! session('newsletter_message.content') !!}</small>
</div>
@endif
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
