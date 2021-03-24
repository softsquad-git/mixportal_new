@extends('layouts.admin')

@section('title', $title)

@section('content')
    @include('admin.partials.header')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">L.p</th>
            <th scope="col">Imię & Nazwisko</th>
            <th scope="col">Adres e-mail</th>
            <th scope="col">Aktywne?</th>
            <th scope="col">Data rejestracji</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $item)
            <tr @if($item->admin == 1) style="background: darkseagreen" @endif>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $item->getFullName() }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->email_verified_at ? $item->email_verified_at : 'Nie' }}</td>
                <td>{{ $item->created_at }}</td>
                <td>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection