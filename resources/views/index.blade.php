@extends('layout.main')
@section('content')
    <div class="text-muted">
        <div class="container">
            <div class="d-flex justify-content-between mb-2">
                <h4 class="text-body">Ads List</h4>
                <a href="{{route('showCreateEditForm')}}" class="btn btn-sm btn-primary">New ad</a>
            </div>
            <div class="row text-body mb-3">
                <div class="col-1">
                    <p>N</p>
                </div>
                <div class="col-1">
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
                <div class="col-1">
                    <p>State</p>
                </div>
                <div class="col-2">
                    <p>Actions</p>
                </div>
            </div>
            @foreach($ads as $key => $ad)
                <div class="row text-body">
                    <div class="col-1">
                        <p>{{$key + 1}}</p>
                    </div>
                    <div class="col-1">
                        <p>{{$ad->title}}</p>
                    </div>
                    <div class="col-2">
                        <p>{{$ad->description}}</p>
                    </div>
                    <div class="col-2">
                        <p>{{$ad->category->name}}</p>
                    </div>
                    <div class="col-2">
                        <p>{{$ad->subCategory->name}}</p>
                    </div>
                    <div class="col-1">
                        <p>{{$ad->price}}</p>
                    </div>
                    <div class="col-1">
                        <p>{{$ad->state}}</p>
                    </div>
                    <div class="col-1">
                        <p><a href="{{route('showCreateEditForm', $ad->id)}}" class="btn btn-link">Edit</a></p>
                    </div>
                    <div class="col-1">
                        <form action="{{route('deleteAd', $ad->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <p><button type="submit" style="color: #ff0000" class="btn btn-link">Delete</button></p>
                        </form>
                    </div>
                </div>
            @endforeach
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ex diam, sodales at consequat id, viverra ut dolor. In eget orci sit amet magna sagittis mattis sit amet sed augue. Vivamus facilisis libero ligula, vel sodales ipsum sollicitudin id. Duis vitae urna rutrum, dignissim arcu ac, elementum augue.</p>
            </div>
        </div>

@endsection
