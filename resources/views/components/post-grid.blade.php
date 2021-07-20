@props(['posts'])
{{-- post="$post" send string. :post="$post send value" --}}
<x-post-feature-card :post="$posts->first()" />

    @if($posts->count() >1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($posts->skip(1) as $post)
            <x-post-card :post="$post" class="{{$loop->iteration<3 ? 'col-span-3' : 'col-span-2'}}"/>
        @endforeach
    </div>
    @endif