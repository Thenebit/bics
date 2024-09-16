<div class="flex flex-col flex-shrink-0 w-72">
    <div class="flex items-center flex-shrink-0 h-10 px-2">
        <span class="block text-sm font-semibold">All Users</span>
        <span class="flex items-center justify-center w-5 h-5 ml-2 text-sm font-semibold text-indigo-500 bg-white rounded bg-opacity-30">{{ $totalstudent }}</span>
    </div>
    @foreach ($students as $student)

        <div class="flex flex-col pb-2 overflow-auto">
            <div class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100" draggable="true">
                <h4 class="mt-3 text-sm font-medium">
                    <a href="{{ url('projectbics', $student->id) }}" class="heading-link">
                        {{ Str::limit( $student->profile->description ?? 'No description available', 250) }}
                    </a>
                </h4>
                <div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
                    <p>{{ $student->name }}</p>

                    @php
                        $name = $student->name;
                        $nameParts = explode(' ', $name);
                        $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                    @endphp

                    <div class="w-6 h-6 ml-auto rounded-full flex items-center justify-center bg-indigo-600 text-white font-semibold">
                        {{$initials}}
                    </div>

                    {{-- <img class="w-6 h-6 ml-auto rounded-full" alt="Naps" src='https://randomuser.me/api/portraits/women/26.jpg'/> --}}
                </div>
            </div>
        </div>
    @endforeach

</div>
