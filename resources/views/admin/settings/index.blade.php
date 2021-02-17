@extends('layouts.admin')
@section('title', $title)
@section('content')
    @include('admin.partials.header')

    <div class="row mt-3">
        <div class="col-md-2">
            <ul class="nav flex-column lang-nav" id="myTab" role="tablist">
                <li class="nav-item d-block" role="presentation">
                    <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account"
                            type="button" role="tab" aria-controls="account" aria-selected="true">Konta
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button"
                            role="tab" aria-controls="user" aria-selected="false">Użytkowników
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="page-tab" data-bs-toggle="tab" data-bs-target="#page" type="button"
                            role="tab" aria-controls="page" aria-selected="false">Strony
                    </button>
                </li>
            </ul>
        </div>

        <div class="col-md-10">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <form method="post" action="{{ route('admin.settings.save') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="email" aria-label="E-mail" placeholder="Adres e-mail" name="email"
                                       class="form-control"
                                       value="{{ Auth::user()->email ? Auth::user()->email : old('email') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="password" aria-label="Hasło" placeholder="Hasło" name="password"
                                       value="{{ old('password') }}" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-outline-success">Zapisz</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
                    <form method="post" action="{{ route('admin.settings.save') }}">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-4">
                                <select name="user_id" aria-label="Wybierz użytkownika" class="form-control">
                                    <option value="" selected>Wybierz użytkownika</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->getFullName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="email" aria-label="E-mail" placeholder="Adres e-mail" name="email"
                                       class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="col-md-4">
                                <input type="password" aria-label="Hasło" placeholder="Hasło" name="password"
                                       value="{{ old('password') }}" class="form-control">
                            </div>
                        </div>
                        <div class="mt-3 row form-group">
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-outline-success">Zapisz</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="page" role="tabpanel" aria-labelledby="page-tab">
                    @foreach($settings as $key => $setting)
                        <form method="post" action="{{ route('admin.settings.page', ['id' => $setting->id]) }}">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="item_{{$key}}"
                                       class="form-label">{{ $setting->getNameType($setting->type) }}</label>
                                <input type="text" id="item_{{$key}}" name="value" class="form-control" placeholder="Wartosć"
                                       value="{{ $setting->value ? $setting->value : old('value') }}">
                            </div>
                            <div class="mt-1 row form-group">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Zapisz</button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection