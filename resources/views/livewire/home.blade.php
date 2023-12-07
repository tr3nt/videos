<div>
    <form wire:submit.prevent="search">
        <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 
            leading-tight focus:outline-none focus:bg-white focus:border-red-900"
            type="text" placeholder="Todos" wire:model="searchTxt"
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
</div>
