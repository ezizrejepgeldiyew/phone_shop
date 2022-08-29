@extends('layouts.app1')
@section('skilet')

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Country Updated
            </header>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('country.update', ['country' => $country->id]) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " name="name" value="{{ $country->name }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"> Uytget </button>
                </form>
            </div>
        </section>

    </div>
@endsection
