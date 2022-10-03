<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>PDFFile</title>
        <x-sharing.bootstrap></x-sharing.bootstrap>
    </head>
    <body>
        <div class="mt-5">
            @auth
                <iframe type="application/pdf" id="document_file" alt="{{ $document->document_path }}" class="object-fit w-full" src="{{ asset('storage/documents/' . $document->document_path) }}"></iframe>
            @endauth
        </div>
    </body>
</html>

<style>
iframe[src$=".pdf"]{
    width:100%;
    height:80vh;
}
</style>