@extends('layouts.admin')

@section('title', $title)

@section('content')
    @include('admin.partials.header', ['title' => $title, 'cancel' => route('admin.pages.index')])
    <form action="{{ $item->id ? route('admin.pages.update', ['id' => $item->id]) : route('admin.pages.create') }}" method="POST">
        @csrf
        <div class="row form-group">
            <div class="col-md-8">
                <label class="form-label" for="title">Tytuł</label>
                <input type="text" id="title" class="form-control" value="{{ $item->title ? $item->title : old('title') }}" name="title">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
            <div class="col-4">
                <label class="form-label" for="lang">Język</label>
                <select id="lang" class="form-control" name="lang">
                    @foreach(config('app.languages') as $key => $lang)
                        <option value="{{ $key }}"{{ $item->lang == $key ? 'selected' : '' }}>{{ $lang }}</option>
                    @endforeach
                </select>
                @error('lang')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="row form-group mt-3">
            <div class="col-md-12">
                <label class="form-label" for="content">Treść</label>
                <textarea name="content" class="ckeditor form-control" id="content">{{ $item->content ? $item->content : old('content') }}</textarea>
            </div>
        </div>
        <div class="row form-group mt-3">
            <div class="col-md-2">
                <button type="submit" class="btn btn-sm btn-outline-success">Zapisz</button>
            </div>
        </div>
    </form>
@endsection