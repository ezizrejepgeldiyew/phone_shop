@extends('layouts.app1')
@section('skilet')

        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Ourbrand Table
                    <a class="btn btn-success" href="{{ route('ourbrand.create') }}"><i class="fa fa-plus"></i></a>
                </header>
                @if (!empty($ourbrands))
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                        <tr>
                            <th><i class="icon_profile"></i> Photo</th>
                            <th><i class="icon_calendar"></i> Name</th>
                            <th><i class="icon_mail_alt"></i> Date</th>
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @foreach ($ourbrands as $item)
                            <tr>
                                <td><img src="{{ asset('images/' . $item->photo) }}" width="100"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                            href="{{ route('ourbrand.edit', ['ourbrand' => $item->id]) }}"><i
                                                class="btn btn-puls"></i></a>
                                        <form action="{{ route('ourbrand.destroy', ['ourbrand' => $item->id]) }}"
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
