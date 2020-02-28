@extends('layout.main')
@section('content')
    <div class="text-muted">
        <div class="container">
            @error('id')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="d-flex justify-content-between mb-2">
                <h4 class="text-body">Ads List</h4>
            </div>
            <div class="row text-body mb-3">
                <div class="col-1">
                    <p>N</p>
                </div>
                <div class="col-2">
                    <p>Title</p>
                </div>
                <div class="col-2">
                    <p>Description</p>
                </div>
                <div class="col-2">
                    <p>Category</p>
                </div>
                <div class="col-2">
                    <p>Sub Category</p>
                </div>
                <div class="col-1">
                    <p>Price</p>
                </div>
                <div class="col-2">
                    <p>State</p>
                </div>
            </div>
            @if(count($ads) === 0)<div class="col-12 alert alert-info text-center">No Records</div>@endif
            @foreach($ads as $key => $ad)
                <div class="row text-body">
                    <div class="col-1">
                        <p>{{$key + 1}}</p>
                    </div>
                    <div class="col-2">
                        <p>{{$ad->title}}</p>
                    </div>
                    <div class="col-2">
                        <p>{{$ad->description}}</p>
                    </div>
                    <div class="col-2">
                        <p>{{$ad->category->name}}</p>
                    </div>
                    <div class="col-2">
                        <p>@if($ad->subCategory){{$ad->subCategory->name}}@else - @endif</p>
                    </div>
                    <div class="col-1">
                        <p>{{$ad->price}}</p>
                    </div>
                    <div class="col-2">
                        <p>{{$ad->state}}</p>
                    </div>
                </div>
            @endforeach
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ex diam, sodales at consequat id, viverra ut dolor. In eget orci sit amet magna sagittis mattis sit amet sed augue. Vivamus facilisis libero ligula, vel sodales ipsum sollicitudin id. Duis vitae urna rutrum, dignissim arcu ac, elementum augue.</p>
            </div>
        </div>
@endsection
