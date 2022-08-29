@extends('layouts.app1')
@section('skilet')

        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Advanced Table
                    <a class="btn btn-success" href="{{ route('kuriyent.create') }}"><i class="fa fa-plus"></i></a>
                </header>



                @if (!empty($kuriyent))

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                        <tr>
                            <th><i class="icon_profile"></i> Full Name</th>
                            <th><i class="icon_calendar"></i> Date</th>
                            <th><i class="icon_mail_alt"></i> Email</th>
                            <th><i class="icon_pin_alt"></i> City</th>
                            <th><i class="icon_mobile"></i> Mobile</th>
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @foreach ($kuriyent as $item)
                            <tr>
                                <td><img src="{{ asset('storage/' . $item->photo) }}" width="100"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->country->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                            href="{{ route('kuriyent.edit', ['kuriyent' => $item->id]) }}"><i
                                                class="btn btn-plus"></i></a>
                                        <form action="{{ route('kuriyent.destroy', ['kuriyent' => $item->id]) }}"
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
                </table>
                @endif
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
