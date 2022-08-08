<div>
    @foreach($notices as $notice)
        <p>{{ $notice->content }}</p>
        <p><img src="{{ Storage::url($notice->image_path) }}" width="25%"></p>
        <hr>
    @endforeach
</div>