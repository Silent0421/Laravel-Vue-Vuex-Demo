@extends('layout.main')
@section('content')
    <div class="container">
        <h2>@if($ad) Edit ad @else Create Ad @endif</h2>
        <div class="row">
            <div class="col-6">
            <form action="@if(!$ad){{route('createAd')}}@else{{route('updateAd', $ad->id)}}@endif" method="post">
                @csrf
                @if($ad)
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$ad->id}}">
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" id="title" type="text" name="title" @if($ad) value="{{$ad->title}} @endif">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" type="text" name="description">@if($ad){{$ad->description}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($ad && $ad->id == $category->id) selected="selected" @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_category">Category</label>
                    <select class="form-control" id="sub_category" name="sub_category_id">
                    </select>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input class="form-control" id="state" type="text" name="state" @if($ad) value="{{$ad->state}} @endif">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" id="price" type="text" name="price"@if($ad) value="{{$ad->price}} @endif">
                </div>
                <button type="submit" class="btn btn-primary mb-3">@if($ad) Edit ad @else Create Ad @endif</button>
            </form>
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ex diam, sodales at consequat id, viverra ut dolor. In eget orci sit amet magna sagittis mattis sit amet sed augue. Vivamus facilisis libero ligula, vel sodales ipsum sollicitudin id. Duis vitae urna rutrum, dignissim arcu ac, elementum augue.</p>
    </div>
@endsection

@section('scripts')
    <script>
        $(window).on('load', () => {
            const categoryId = $('#category').val();
            getSubcategories(categoryId);
        });

        $('#category').on('change', () => {
            const categoryId = $('#category').val();
            getSubcategories(categoryId);
        });

        const getSubcategories = (categoryId) => {
            $.ajax({
                url: '/ads/subcategories/' + categoryId,
                success: createSubCategoryOptions
            });
        };

        const createSubCategoryOptions = (data) => {
            const select = $('#sub_category');
            select.empty();
            for (let i = 0; i < data.length; i++) {
                select.append('<option value=' + data[i].id + '>' + data[i].name + '</option>');
            }
        }
    </script>
@endsection
