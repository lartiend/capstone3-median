<div style="width: 100%;" class="card mx-1" >
    <img class="card-img-top" src='{{ asset($data->image) }}' alt="Card image cap">
    <div class="card-header" style="height: 100px;">
    	<h6 style="font-weight: 700">{!! $data->title !!}</h6>
        <small> {{ $data->getUser->username }} | {{$data->created_at->format('Y.m.d')}} </small>
    </div>
    <div class="card-body">
        <p class="text-truncate m-0">
            {!! $data->content !!}
        </p>
        <p class="my-1">
            <a href='{{url("articles/$data->id")}}'>
                <small class="float-left text-info" style="font-size: small">
                    Read more
                </small>
            </a>
            <small class="float-right text-muted" style="font-size: small">{{ $data->getComments->count() }} responses</small>
        </p>
    </div>
    <div class="card-footer">
        <small class="text-muted float-left">
            <i class="fa-2x fa fa-fw fa-star text-warning" aria-hidden="true"></i>
            {{ $data->rate }}
        </small>
        <form class="form-inline float-right" method="post" action='{{url("bookmarks")}}'>
            {{csrf_field()}}
            <input type="hidden" name="articleID" value='{{$data->id}}'>
            <button type="submit" style="border: none; background-color: inherit;cursor:pointer;">
                @if(
                    App\Bookmark::where('article_id', $data->id)
                    ->where('user_id', Auth::user()->id)->exists() == true 
                    )
                    <i class="fa-2x fa fa-fw fa-bookmark text-success" aria-hidden="true"></i>
                @else
                    <i class="fa-2x fa fa-fw fa-bookmark-o text-success" aria-hidden="true"></i>
                @endif
            </button>
        </form>        	
    </div>
</div>
