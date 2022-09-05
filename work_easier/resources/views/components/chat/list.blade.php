@props([
    'notices' => []    
])

<div class="bg-white rounded-md shadow-lg mt-5 mb-5">
    <ul>
        @foreach($notices as $notice)
            <li class="border-b last:border-b-0 border-gray-200 p-4 flex items-start justiry-between">
                <div>
                    <span class="inline-block rounded-full text-gray-600 bg-gray-100 px-2 py-1 text-xs mb-2">
                        {{ $notice->user->name }}
                    </span>
                    <p class="text-gray-600">{!! nl2br(e($notice->content)) !!}</p>
                    <x-chat.images :images="$notice->images"/>
                </div>
                <div>
                    
                </div>
            </li>
        @endforeach
    </ul>
</div>