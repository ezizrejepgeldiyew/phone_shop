@extends('layouts.app1')
@section('skilet')

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Ourbrand Create
            </header>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('ourbrand.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name">
                        </div>
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="photo" onchange="previewFile(this)">
                            <img id="previewImg" alt="profile image" style="max-width: 130px; margin-top: 20px;">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"> Gos </button>
                </form>
            </div>
        </section>
    </div>
    <script src="{{ asset('js/previewImg.js') }}"></script>
@endsection
