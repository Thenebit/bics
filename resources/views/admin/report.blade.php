<div class="flex flex-col flex-shrink-0 w-72">
    <div class="flex items-center flex-shrink-0 h-10 px-2">
        <span class="block text-sm font-semibold">{{__('Reports') }}</span>
        <span class="flex items-center justify-center w-5 h-5 ml-2 text-sm font-semibold text-indigo-500 bg-white rounded bg-opacity-30">3</span>
        <button class="flex items-center justify-center w-6 h-6 ml-auto text-indigo-500 rounded hover:bg-indigo-500 hover:text-indigo-100">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </button>
    </div>
    <div class="flex flex-col pb-2 overflow-auto">
        <div class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100" draggable="true">

            <button class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-red-500 rounded hover:bg-red-200 hover:text-red-700 group-hover:flex">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M6 6h12v2H6V6zm1-4a1 1 0 00-1 1v1H4a2 2 0 00-2 2v14a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 00-1-1H7zM6 8v14h12V8H6zm3 2h6v10H9V10z" />
                </svg>
            </button>

            <!-- <span class="flex items-center h-6 px-3 text-xs font-semibold text-yellow-500 bg-yellow-100 rounded-full">Copywriting</span> -->
            <h4 class="mt-3 text-sm font-medium">This is the title of the card for the thing that needs to be done.</h4>
            <div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
                <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 5h12v2H4V5z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h1V3a1 1 0 112 0v1h8V3a1 1 0 112 0v1h1a1 1 0 011 1v1H3V6z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M6 8a1 1 0 00-1 1v8a1 1 0 001 1h8a1 1 0 001-1V9a1 1 0 00-1-1H6zm1 2h6v6H7V10z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-1 leading-none">Dec 12</span>
                </div>
                <div class="relative flex items-center ml-4">
                    <svg class="relative w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-1 leading-none">4</span>
                </div>
                <div class="flex items-center ml-4">
                    <svg class="w-4 h-4 text-gray-300 fill-current"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-1 leading-none">1</span>
                </div>
                <img class="w-6 h-6 ml-auto rounded-full" src='https://randomuser.me/api/portraits/women/26.jpg'/>
            </div>
        </div>
        
    </div>
</div>
