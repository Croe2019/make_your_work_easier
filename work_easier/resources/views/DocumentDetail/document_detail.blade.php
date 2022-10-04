<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>DocumentDetail</title>
        <link rel="stylesheet" href="{{ asset('/assets/css/document_name.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/tag.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/pdf_url.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/image.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/download_button.css') }}">
        <x-sharing.bootstrap></x-sharing.bootstrap>
    </head>
    <body>
        <div class="mt-5">
            @auth
                <h2>{{ $document->document_name }}</h2>
                @foreach($document->tags as $tag)
                    <span>{{ $tag->name }}</span>
                @endforeach
                @if(substr($file_name->document_path, -4) == '.pdf')
                    <a href="{{ route('DocumentDetail.PDF', $document->id) }}" target="_blank" rel="noopener noreferrer">
                        <h3 class="mt-5">
                            <i class="far fa-lightbulb"></i>
                                <p>
                                    <img id="document_file" alt="{{ $document->document_name }}" class="object-fit w-full" src="{{ Storage::url($document->document_path) }}" width="50%">
                                </p>
                        </h3>
                    </a>
                @else
                    <h4 class="mt-5">
                        <i class="image-lightbulb"></i>
                        <p>
                            <img id="document_file" alt="{{ $document->document_name }}" class="object-fit w-full" src="{{ Storage::url($document->document_path) }}" width="25%">
                        </p>
                    </h4>
                @endif
            @endauth
        </div>
    </body>
</html>