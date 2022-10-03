<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>DocumentCreating</title>
        <x-sharing.bootstrap></x-sharing.bootstrap>
    </head>
    <body>
        <x-sharing.menu></x-sharing.menu>
        @auth
            <form action="{{ route('document_store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3">
                    <x-document_creating.document_name></x-document_creating.document_name>
                    <x-document_creating.tag></x-document_creating.tag>
                    <x-document_creating.select_file></x-document_creating.select_file>
                    <x-document_creating.sendbutton></x-document_creating.sendbutton>
                    @if(session('feedback.success'))
                        <p style="color: green">{{ session('feedback.success') }}</p>
                    @endif
                </div>
            </form>
        @endauth
    </body>
</html>