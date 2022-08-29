@extends('layouts.app1')
@section('skilet')

 <div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Category Create
        </header>
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <button type="submit" class="btn btn-success"> Gos </button>
            </form>
        </div>
    </section>

</div>
@endsection
