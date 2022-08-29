@extends('layouts.app1')
@section('skilet')
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Country Table
                    <a class="btn btn-success" href="{{ route('country.create') }}"><i class="fa fa-plus"></i></a>
                </header>
                @if (!empty($country))
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                        <tr>
                            <th><i class="icon_profile"></i> Name</th>
                            <th><i class="icon_calendar"></i> Date</th>
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @foreach ($country as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                            href="{{ route('country.edit', ['country' => $item->id]) }}"><i
                                                class="btn btn-puls"></i></a>
                                        <form action="{{ route('country.destroy', ['country' => $item->id]) }}"
                                            method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="btn btn-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @endif
                </table>
            </section>
        </div>
@endsection
