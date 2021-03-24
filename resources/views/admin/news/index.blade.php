@extends('layouts.admin')
@section('title', $title)
@section('content')
    @include('admin.partials.header', ['title' => $title, 'create' => route('admin.news.create')])
    <table class="table">
        <thead>
        <tr>
            <th scope="col">L.p</th>
            <th scope="col">Tytuł</th>
            <th scope="col">Zdjęcie</th>
            <th scope="col">Język</th>
            <th scope="col">Data dodania</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $item)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $item->title }}</td>
                <td><img src="{{ $item->news->getImage() }}" alt="{{ $item->title }}" width="150"></td>
                <td>{{ $item->lang }}</td>
                <td>{{ $item->news->created_at }}</td>
                <td>
                    <a href="{{ route('admin.news.update', ['id' => $item->news->id]) }}" class="btn btn-outline-warning btn-sm">Edytuj</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection