@extends('layouts.app1')
@section('skilet')

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Category Updated
            </header>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('category.update', ['category' => $category->id]) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"> Uytget </button>
                </form>
            </div>
        </section>

    </div>
@endsection
