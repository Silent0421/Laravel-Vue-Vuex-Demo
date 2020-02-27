@extends('layout.main')
@section('content')
    <div class="container">
        <h2>@if($ad) Edit ad @else Create Ad @endif</h2>
        <div class="row">
            <div class="col-6">
<<<<<<< HEAD
                @error('id')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
=======
>>>>>>> origin/master
            <form action="@if(!$ad){{route('createAd')}}@else{{route('updateAd', $ad->id)}}@endif" method="post">
                @csrf
                @if($ad)
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$ad->id}}">
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" id="title" type="text" name="title" @if($ad) value="{{$ad->title}} @endif">
<<<<<<< HEAD
                    @error('title')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
=======
>>>>>>> origin/master
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" type="text" name="description">@if($ad){{$ad->description}}@endif</textarea>
<<<<<<< HEAD
                    @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
=======
>>>>>>> origin/master
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach($categories as $category)
<<<<<<< HEAD
                            <option value="{{$category->id}}" @if($ad && ($ad->category->id == $category->id)) selected="selected" @endif>{{$category->name}}</option>
=======
                            <option value="{{$category->id}}" @if($ad && $ad->id == $category->id) selected="selected" @endif>{{$category->name}}</option>
>>>>>>> origin/master
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_category">Category</label>
<<<<<<< HEAD
                    <select class="form-control" id="sub_category" name="sub_category_id" @if($ad && $ad->subCategory)data-selected="{{$ad->subCategory->id}}@endif">
=======
                    <select class="form-control" id="sub_category" name="sub_category_id">
>>>>>>> origin/master
                    </select>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
<<<<<<< HEAD
                    <input class="form-control" id="state" type="text" name="state" @if($ad) value="{{$ad->state}} @endif" placeholder="You can type one of the states: bad, average, good, excellent">
                    @error('state')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
=======
                    <input class="form-control" id="state" type="text" name="state" @if($ad) value="{{$ad->state}} @endif">
>>>>>>> origin/master
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" id="price" type="text" name="price"@if($ad) value="{{$ad->price}} @endif">
<<<<<<< HEAD
                    @error('price')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
=======
>>>>>>> origin/master
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
<<<<<<< HEAD
        $(document).ready(() => {
=======
        $(window).on('load', () => {
>>>>>>> origin/master
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
<<<<<<< HEAD
            let selectedId = +select.attr('data-selected');
            select.removeAttr('data-selected');
            select.empty();
            if (data.length === 0) {
                select.append('<option value=""></option>');
            }
            for (let i = 0; i < data.length; i++) {
                let optionStart = '<option value=' + data[i].id + ' ';
                if(selectedId === data[i].id) {
                    optionStart += 'selected="selected" ';
                }
                const optionEnd = '>' + data[i].name + '</option>';
                select.append(optionStart + optionEnd);
=======
            select.empty();
            for (let i = 0; i < data.length; i++) {
                select.append('<option value=' + data[i].id + '>' + data[i].name + '</option>');
>>>>>>> origin/master
            }
        }
    </script>
@endsection
