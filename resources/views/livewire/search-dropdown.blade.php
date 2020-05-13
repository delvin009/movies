<div class="relative mt-3 md:mt-0" x-data="{isOpen:true}" @click.away="isOpen = false"> <!--alpinjs component-->
    <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1
        focus:outline-none focus:shadow-outline" placeholder="Search.." @focus="isOpen = true" 
        @keydown.shift.tab="isOpen = false" @keydown="isOpen = true"
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 191){ 
                event.preventDefault();
                $refs.search.focus();
            }
        "
    >
    <!--191 = keybode code for backslash "/"-->
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

    @if(strlen($search) > 2) <!--n/a show based in search-->
        <div class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4" 
            x-show.transition.opacity="isOpen" @keydown.escape.window="isOpen = false" 
        > <!--alpinjs component-->
            @if($searchResults->count() > 0 ) <!-- display the result only the condition is true-->
                <ul>
                    @foreach($searchResults as $result)
                        <li class="border-b border-gray-700">
                            <a href="{{route('movies.show', $result['id'])}}" class="block hover:bg-gray-700 px-3 py-3
                                flex items-center transition ease-in-out duration-150"
                                @if($loop->last) @keydown.tab="isOpen = false" @endif
                            >
                                @if($result['poster_path']) <!-- some movies dont have posters-->
                                    <img src="{{'https://image.tmdb.org/t/p/w92/' . $result['poster_path']}}" alt="poster" class="w-8">
                                @else
                                    <img src="/logo/placeholder.jpg" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{$result['title']}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div>no results available for "{{$search}}"</div>
            @endif
        </div>
    @endif
</div>

