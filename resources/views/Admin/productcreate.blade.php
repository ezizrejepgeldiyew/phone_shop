@extends('layouts.app1')
@section('skilet')

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Product Create
            </header>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('product.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="photo" onchange="previewFile(this)">
                            <img id="previewImg" alt="profile image" style="max-width: 130px; margin-top: 20px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Multiple Photos</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="photos[]" multiple="multiple">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Category</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="category_id">
                                <option value="">- Choose Cateogry -</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-2">Our Brand</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="ourbrand_id">
                                <option value="">- Choose OurBrand -</option>
                                @foreach ($ourbrand as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Country</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="country_id">
                                <option value="">- Choose Country -</option>
                                @foreach ($country as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="price">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Discount</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="discount">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="colors" class="col-sm-2 control-label">Colors</label>
                        <div class="col-sm-10">
                            <select id="colors" name="colors[]" class="select2" multiple="multiple"
                                data-placeholder="Select a State" style="width: 100%;">
                                <option>Red</option>
                                <option>Black</option>
                                <option>Blue</option>
                                <option>Yellow</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"> Gos </button>
                </form>
            </div>
        </section>
    </div>
    <script src="{{ asset('js/previewImg.js') }}"></script>
@endsection
