<div class="flex flex-col flex-shrink-0 w-72">
    <div class="flex items-center flex-shrink-0 h-10 px-2">
        <span class="block text-sm font-semibold">{{__('fhas Department') }}</span>
        <span class="flex items-center justify-center w-5 h-5 ml-2 text-sm font-semibold text-indigo-500 bg-white rounded bg-opacity-30">

            {{ $ideasCountByDepartment->where('department', 'FHAS')->first()->total ?? 0 }}

        </span>  {{-- Total count of idea posted based on department from profile --}}
        <button class="flex items-center justify-center w-6 h-6 ml-auto text-indigo-500 rounded hover:bg-indigo-500 hover:text-indigo-100">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </button>
    </div>
    <div class="flex flex-col pb-2 overflow-auto">

        @php
            $ideasByDepatment = $ideas->filter(function ($idea) {
                return $idea->user->profile->department === 'FHAS';
            });
        @endphp

        @if ($ideasByDepatment->isEmpty())
            <p class="text-center text-gray-500 mt-4">No ideas available</p>
        @else
        @foreach($ideasByDepatment as $idea)

        <div class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100" draggable="true">
            <button class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                </svg>
            </button>
            <span class="flex items-center h-6 px-3 text-xs font-semibold text-pink-500 bg-pink-100 rounded-full">
                {{ $idea->importance }}
            </span>  {{--  Idea importance level --}}
            <h4 class="mt-3 text-sm font-medium">
                <a href="{{ url('forum', $idea->id) }}" class="heading-link">
                    <p class="heading">
                        {{ Str::limit($idea->description, 250) }}
                    </p>
                </a>
            </h4>  {{-- Ideas description--}}
            <div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
                <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-1 leading-none">{{ $idea->created_at->diffForHumans() }}</span>  {{-- Date Idea posted --}}
                </div>
                <div class="relative flex items-center ml-4">
                    <svg class="relative w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-1 leading-none">{{ $idea->comments->count() }}</span>  {{-- Total comment on the idea --}}
                </div>
                <div class="flex items-center ml-4">
                    <svg class="w-4 h-4 text-gray-300 fill-current"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-1 leading-none">{{ $idea->contributor->count() }}</span>  {{-- Total collaborators --}}
                </div>
                <div class="w-6 h-6 ml-auto rounded-full flex items-center justify-center bg-indigo-600 text-white font-semibold">
                    @php
                                $name = $idea->user->name;
                                $nameParts = explode(' ', $name);
                                $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                            @endphp
                        {{ $initials }}
                </div>
            </div>
        </div>
        @endforeach
        @endif

    </div>
</div>
