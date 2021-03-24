<div class="row mt-2 mb-4">
    <div class="col-md-5">
        <h4>{{ $title ?? '' }}</h4>
    </div>
    <div class="col-md-7" style="text-align: right!important;">
        @if(isset($create) && !empty($create))
            <a href="{{ $create }}" class="btn btn-sm btn-outline-success" title="Dodaj">Dodaj</a>
        @endif
        @if(isset($cancel) && !empty($cancel))
            <a href="{{ $cancel }}" class="btn btn-sm btn-outline-danger" title="Anuluj">Anuluj</a>
        @endif
    </div>
</div>