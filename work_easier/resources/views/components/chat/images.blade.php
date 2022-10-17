@props([
    'images' => []
])

@if(count($images) > 0)
<link rel="stylesheet" href="{{ asset('/assets/css/notice_image.css') }}">
    <div class="flex-container">
        @foreach($images as $image)
            <div class="image-wrap">
                <a href="{{ asset('storage/images/' . $image->image_name) }}" data-lightbox="group">
                    <img alt="{{ $image->image_name }}" class="notice_image" src="{{ asset('storage/images/' . $image->image_name) }}">
                </a>
            </div>
        @endforeach   
    </div>
@endif
