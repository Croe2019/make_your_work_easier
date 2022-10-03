@props([
    'document_list' => []    
])

<div class="bg-white rounded-md shadow-lg mt-5 mb-5">
    <ul>
        @foreach($document_list as $document)
            <li class="border-b last:border-b-0 border-gray-200 p-4 flex items-start justiry-between">
                <div>
                    <span class="inline-block rounded-full text-gray-600 bg-gray-100 px-2 py-1 text-xs mb-2">
                        {{ $document->name }}
                    </span>
                    <p class="text-gray-600">{!! nl2br(e($document->document_name)) !!}</p>
                    <img alt="{{ $document->document_path }}" class="object-fit w-full" src="{{ asset('storage/documents/' . $document->document_path) }}" width="25%">
                </div>
                <div>
                    
                </div>
            </li>
        @endforeach
    </ul>
</div>