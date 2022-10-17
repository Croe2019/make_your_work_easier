@props([
    'images' => []
])

@if(count($images) > 0)
<link rel="stylesheet" href="{{ asset('/assets/css/notice_image.css') }}">
<div class="flex-container">
        @foreach($images as $image)
            <div class="image-wrap">
                <img alt="{{ $image->image_name }}" class="notice_image" src="{{ asset('storage/images/' . $image->image_name) }}">
            </div>
        @endforeach   
    </div>
@endif
