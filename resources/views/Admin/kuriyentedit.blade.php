@extends('layouts.app1')
@section('skilet')

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Form Elements
            </header>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('kuriyent.update', ['kuriyent' => $kuriyent->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="photo" onchange="previewFile(this)">
                            <img src="{{ asset('storage/' . $kuriyent->photo) }}" id="previewImg" alt="profile image" style="max-width: 130px; margin-top: 20px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Country</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="country_id">
                                <option value="{{ $kuriyent->country_id }}">{{ $kuriyent->country->name }}</option>
                                @foreach ($country as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $kuriyent->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Last name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="last_name"  value="{{ $kuriyent->last_name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email"  value="{{ $kuriyent->email }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password"  value="{{ $kuriyent->password }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Confirme Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="confirme_password"  value="{{ $kuriyent->password }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone"  value="{{ $kuriyent->phone }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pasport ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pasport" value="{{ $kuriyent->pasport }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success"> Uytget </button>
                </form>
            </div>
        </section>

    </div>



    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

    </script>

@endsection
