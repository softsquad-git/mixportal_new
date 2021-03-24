@extends('layouts.admin')

@section('title', $title)

@section('content')
    @include('admin.partials.header', ['title' => $title, 'create' => route('admin.categories.create')])
    <table class="table">
        <thead>
        <tr>
            <th scope="col">L.p</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Język</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $item)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $item->text }}</td>
                <td>{{ $item->lang }}</td>
                <td>
                    <a href="{{ route('admin.categories.update', ['id' => $item->category->id]) }}" class="btn btn-outline-warning btn-sm">Edytuj</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $data->links() }}
@endsection