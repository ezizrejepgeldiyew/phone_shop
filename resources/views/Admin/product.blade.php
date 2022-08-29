@extends('layouts.app1')
@section('skilet')

        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Product Table
                    <a class="btn btn-success" href="{{ route('product.create') }}"><i class="fa fa-plus"></i></a>
                </header>
                @if (!empty($product))
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                        <tr>
                            <th><i class="icon_profile"></i> Photo</th>
                            <th><i class="icon_calendar"></i> Name</th>
                            <th><i class="icon_mail_alt"></i> Price</th>
                            <th><i class="icon_pin_alt"></i> Ourbrand</th>
                            <th><i class="icon_mobile"></i> Discount</th>
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @foreach ($product as $item)
                            <tr>
                                <td><img src="{{ asset('images/' . $item->photo) }}" width="100"></td>
                                <td>{{ $item->name }}</td>
                                @isset($item->discount)
                                    <td>{{ ($item->price / 100) * 30 }} <del>{{ $item->price }}</del></td>
                                @endisset
                                @empty($item->discount)
                                    <td> {{ $item->price }} </td>
                                @endempty

                                <td>{{ $item->ourbrand->name }}</td>
                                <td>{{ $item->discount }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                            href="{{ route('product.edit', ['product' => $item->id]) }}"><i
                                                class="btn btn-plus"></i></a>
                                        <form action="{{ route('product.destroy', ['product' => $item->id]) }}"
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
@endsection
