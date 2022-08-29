@extends('layouts.app1')
@section('skilet')

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Category Table
                <a class="btn btn-success" href="{{ route('category.create') }}"><i class="fa fa-plus"></i></a>
            </header>
            @if (!empty($category))
            <table class="table table-striped table-advance table-hover">
                <tbody>
                    <tr>
                        <th><i class="icon_profile"></i> Name</th>
                        <th><i class="icon_calendar"></i> Date</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary"
                                        href="{{ route('category.edit', ['category' => $item->id]) }}"><i
                                            class="btn btn-pencil"></i></a>
                                    <form action="{{ route('category.destroy', ['category' => $item->id]) }}"
                                        method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="btn btn-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </section>
    </div>

@endsection
