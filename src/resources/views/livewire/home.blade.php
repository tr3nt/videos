<div>
    <form wire:submit.prevent="search">
        <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 
            leading-tight focus:outline-none focus:bg-white focus:border-red-900"
            type="text" placeholder="Todos" wire:model="searchTxt" autocomplete="off"
        />
        <button class="shadow bg-gray-500 hover:bg-red-900 focus:shadow-outline focus:outline-none text-white 
            font-bold py-2 px-4 rounded" type="submit">Buscar
        </button>
    </form>
    <div class="flex flex-row mt-2">
        <ul>
            @foreach($videos as $video)
            <li>
                <div class="flex items-center mb-1">
                    <a href="/ver/{{ $video['id'] }}">
                        <img class="w-28 h-20" src="https://img.youtube.com/vi/{{ $video['key'] }}/0.jpg" alt="">
                    </a>
                    <div class="ml-4 pr-2">
                        <h2 class="text-sm font-medium text-gray-700">{{ $video['title'] }}</h2>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Alert field -->
    @if (session()->has('message'))
    <div class="flex items-center bg-gray-500 text-white text-sm font-bold px-4 py-3 my-5 text-left" role="alert">
        <svg class="fill-current w-4 h-4 mr-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
        </svg>
        <p>{!! session('message') !!}</p>
    </div>
    @endif
</div>
