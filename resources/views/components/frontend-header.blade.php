<header class="bg-white sticky top-0 z-40">

    <div class="flex justify-around items-center container mx-auto py-2">
        <div class="">
            <span class="text-red-500 font-bold text-4xl ">कटुञ्जे </span>
            <span class=" text-blue-500 text-xl">दैनिक</span>
            <img class="w-[150px] h-[20px]" src="{{asset('frontend/images/purpleline.png')}}" alt="purple_line">
        </div>
        <div>
            <p class="text-xl">
                {{toNepaliDate(now()->format('Y-m-d'))}}
            </p>
        </div>
    </div>


    <div class="bg-gray-100">
        <nav class="mt-5 container mx-auto flex justify-between items-center p-2">

        <div class="flex gap-20 items-center text-xl font-bold">
           <a href="{{route('home')}}" class=" group relative inline-flex items-center gap-1 text-slate-700 font-medium
                  after:absolute after:bottom-[-2px] after:left-0 
                  after:h-[2.5px] after:w-0 after:bg-blue-600 
                  after:transition-all after:duration-300 hover:after:w-full">गृहपृष्ठ</a>
           @foreach ($categories as $category )
                <a href="{{route('category', $category->slug)}}" class=" group relative inline-flex items-center gap-1 text-slate-700 font-medium
                  after:absolute after:bottom-[-2px] after:left-0 
                  after:h-[2.5px] after:w-0 after:bg-blue-600 
                  after:transition-all after:duration-300 hover:after:w-full">{{$category->title}}</a> 
           @endforeach
        </div>

        <div>

            <form action="{{route('search')}}" method="get" class="max-w-md mx-auto">   
                <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" class="font-bold"/></svg>
                    </div>
                    <input type="search" name="q" id="search" class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" placeholder="Search" required />
                    <button type="submit" class="absolute end-1.5 bottom-1.5 text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">Search</button>        

                </div>
            </form>

        </div>
    </nav>
    </div>
</header>