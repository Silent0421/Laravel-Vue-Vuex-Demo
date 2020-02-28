@extends('layout.main')
@section('content')
    <div class="container">
        <h2>@if($ad) Edit ad @else Create Ad @endif</h2>
        <div class="row">
            <div class="col-6">
                @error('id')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            <form action="@if(!$ad){{route('createAd')}}@else{{route('updateAd', $ad->id)}}@endif" method="post">
                @csrf
                @if($ad)
                    @method('PUT')
                    <input type="hidden" name="id" value="22">
                @endif
                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" id="title" type="text" name="title" @if($ad) value="{{$ad->title}} @endif">
                    @error('title')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" type="text" name="description">@if($ad){{$ad->description}}@endif</textarea>
                    @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($ad && ($ad->category->id == $category->id)) selected="selected" @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_category">Category</label>
                    <select class="form-control" id="sub_category" name="sub_category_id" @if($ad && $ad->subCategory)data-selected="{{$ad->subCategory->id}}@endif">
                    </select>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input class="form-control" id="state" type="text" name="state" @if($ad) value="{{$ad->state}} @endif" placeholder="You can type one of the states: bad, average, good, excellent">
                    @error('state')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" id="price" type="text" name="price"@if($ad) value="{{$ad->price}} @endif">
                    @error('price')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
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
        $(document).ready(() => {
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
            }
        }
    </script>
@endsection
