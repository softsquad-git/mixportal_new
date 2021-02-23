<a href="{{ route('front.news.show', ['id' => $item->id]) }}" class="single-news @if(isset($big) && $big == true) big @endif" style="background: url({{ $item->news->getImage() }})">
    <div class="title">
        {{ $item->title }}
    </div>
</a>