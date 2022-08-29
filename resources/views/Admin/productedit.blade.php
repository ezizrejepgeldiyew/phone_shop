@extends('layouts.app1')
@section('skilet')

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Form Elements
            </header>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('product.update', ['product' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="photo" onchange="previewFile(this)">
                            <img src="{{ asset('images/' . $product->photo) }}" id="previewImg" alt="profile image" style="max-width: 130px; margin-top: 20px;">
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
                                <option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
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
                                <option value="{{ $product->ourbrand_id }}">{{  $product->ourbrand->name }}</option>
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
                                <option value="{{ $product->country_id }}">{{ $product->country->name }}</option>
                                @foreach ($country as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Discount</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="discount" value="{{ $product->discount }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                          <textarea name="description"  class="form-control" cols="30" rows="5" >{{ $product->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="colors" class="col-sm-2 control-label">Colors</label>
                        <div class="col-sm-10">
                            <select id="colors" name="colors[]" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                            <option>Red</option>
                            <option>Black</option>
                            <option>Blue</option>
                            <option>Yellow</option>
                        </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"> Uytget </button>
                </form>
            </div>
        </section>
    </div>
    <script src="{{ asset('js/previewImg') }}"></script>
@endsection
