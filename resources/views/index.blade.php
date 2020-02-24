@extends('layout.main')
@section('content')
    <div class="text-muted">
        <div class="container">
            <h1>Ads list</h1>
            @foreach($ads as $key => $ad)
                <div class="row">
                    <div class="col-12">
                        <p>{{$ad->id}} {{$ad->title}} {{$ad->description}} {{$ad->category->name}} {{$ad->price}} {{$ad->state}}</p>
                    </div>
                </div>
            @endforeach
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ex diam, sodales at consequat id, viverra ut dolor. In eget orci sit amet magna sagittis mattis sit amet sed augue. Vivamus facilisis libero ligula, vel sodales ipsum sollicitudin id. Duis vitae urna rutrum, dignissim arcu ac, elementum augue.</p>
            </div>
        </div>
    </div>

@endsection
