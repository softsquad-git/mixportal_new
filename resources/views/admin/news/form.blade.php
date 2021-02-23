@extends('layouts.admin')

@section('title', $title)

@section('content')
    @include('admin.partials.header', ['title' => $title, 'cancel' => route('admin.news.index')])
    <form action="{{ $item->id ? route('admin.news.update', ['id' => $item->id]) : route('admin.news.create') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="row form-group">
            <div class="col-12">
               <label for="image" class="form-label">Zdjęcie główne</label>
                <input id="image" type="file" class="form-control" name="image">
            </div>
        </div>
        <div class="row form-group mt-3">
            <div class="col-md-2">
                <ul class="nav flex-column lang-nav" id="myTab" role="tablist">
                    <li class="nav-item d-block" role="presentation">
                        <button class="nav-link active" id="pl-tab" data-bs-toggle="tab" data-bs-target="#pl" type="button" role="tab" aria-controls="pl" aria-selected="true">Polski</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab" aria-controls="en" aria-selected="false">Angielski</button>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="pl" role="tabpanel" aria-labelledby="pl-tab">
                        <div class="form-group">
                            <label for="titlePL" class="form-label">Tytuł (pl)</label>
                            <input type="text" id="titlePL" value="{{ $item->getLangTranslate('pl') ? $item->getLangTranslate('pl')->title : old('trans.pl.title') }}" name="trans[pl][title]" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="pretextPL" class="form-label">{{ trans('trans.forms.pre_info') }} (pl)</label>
                            <textarea type="text" class="form-control" id="pretextPL" name="trans[pl][pretext]"
                                      maxlength="200">{{ $item->getLangTranslate('pl') ? $item->getLangTranslate('pl')->pretext : old('trans.pl.pretext') }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="contentPL" class="form-label">{{ trans('trans.forms.pre_info') }} (pl)</label>
                            <textarea id="contentPL" class="ckeditor form-control"
                                      name="trans[pl][wysiwyg-editor]" required>{{ $item->getLangTranslate('pl') ? $item->getLangTranslate('pl')->text : old('trans.pl.text') }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                        <div class="form-group">
                            <label for="titleEN" class="form-label">Tytuł (en)</label>
                            <input type="text" id="titleEN" name="trans[en][title]" value="{{ $item->getLangTranslate('en') ? $item->getLangTranslate('en')->title : old('trans.en.title') }}" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="pretextEN" class="form-label">{{ trans('trans.forms.pre_info') }} (en)</label>
                            <textarea type="text" class="form-control" id="pretextEN" name="trans[en][pretext]"
                                      maxlength="200">{{ $item->getLangTranslate('en') ? $item->getLangTranslate('en')->pretext : old('trans.en.pretext') }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="contentEN" class="form-label">{{ trans('trans.forms.pre_info') }} (en)</label>
                            <textarea id="contentEN" class="ckeditor form-control"
                                      name="trans[en][wysiwyg-editor]" required>{{ $item->getLangTranslate('en') ? $item->getLangTranslate('en')->text : old('trans.en.text') }}</textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-success btn-sm mt-3">Zapisz</button>
            </div>
        </div>
    </form>
@endsection

@section('customScripts')
    <script type="text/javascript">
        CKEDITOR.replace('contentPL, contentEN', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'

        });
    </script>
@endsection