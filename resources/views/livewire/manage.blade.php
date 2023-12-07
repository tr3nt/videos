<div class="flex flex-row w-[1000px]">
    <div class="w-[500px] pr-5">
        @foreach($videos as $video)
            <div class="flex items-center mb-1">
                <img class="w-14 h-10" src="https://img.youtube.com/vi/{{ $video['key'] }}/0.jpg" alt="">
                <div class="ml-4 pr-4">
                    <h3 class="text-sm font-medium text-gray-700">{{ $video['title'] }}</h3>
                    <p class="text-xs"><strong>{{ $video['stats']['hits'] ?? 0 }}</strong> Vistas</p>
                </div>
                <button wire:click="deleteVideo({{ $video['id'] }})" wire:confirm="Eliminar Video?" 
                    class="text-red-500 hover:text-red-700" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
                </button>
            </div>
        @endforeach
    </div>
    <div class="card w-[500px] pl-3">
        <div class="card-body">
            <form wire:submit.prevent="addVideo">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                    <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4
                        text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-900"
                        id="title" type="text" placeholder="Inserta título" wire:model="form.title">
                    @error('form.title') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="key" class="block text-sm font-medium text-gray-700">URL</label>
                    <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4
                        text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-900"
                        id="key" type="text" placeholder="https://www.youtube.com/watch?v=Kp4Mvapo5kc" wire:model="url">
                    @error('url') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                <button class="shadow bg-gray-500 hover:bg-red-900 focus:shadow-outline focus:outline-none
                    text-white font-bold py-2 px-4 rounded"
                    type="submit">Guardar
                </button>
            </form>

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
    </div>
</div>
