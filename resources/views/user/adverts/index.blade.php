@extends('layouts.app')
@section('content')
    <div class="container mb-5">
        <h5 class="mb-4">
            {{ $title  }}
        </h5>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">L.p</th>
                <th scope="col">{{ App::getLocale() == 'pl' ? 'Tytuł' : 'Title' }}</th>
                <th scope="col">{{ App::getLocale() == 'pl' ? 'Kategoria' : 'Category' }}</th>
                <th scope="col">Status</th>
                <th scope="col">{{ App::getLocale() == 'pl' ? 'Data dodania' : 'Created at' }}</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $key => $item)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->ad->category->name }}</td>
                    <td>{{ $item->ad->status }}</td>
                    <td>{{ $item->ad->created_at }}</td>
                    <td>
                        <a href="{{ route('user.advert.update', ['id' => $item->ad->id]) }}" class="btn btn-sm btn-warning">{{ App::getLocale() == 'pl' ? 'Edytuj' : 'Edit' }}</a>
                        <a href="" class="btn btn-sm btn-danger">{{ App::getLocale() == 'pl' ? 'Usuń' : 'Remove' }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection