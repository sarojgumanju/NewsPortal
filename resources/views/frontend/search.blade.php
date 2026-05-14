<x-frontend-layout>
    <section class="py-8">
        <div class="container mx-auto ">
            <div class="text-3xl font-bold mb-6">
                <h1>Search Results for {{$q}}:</h1>
            </div>
            <div class="grid grid-cols-3 gap-y-10 gap-x-8">
                <div class="col-span-2 space-y-5">
                @foreach ($articles as $article )

                {{-- get all the articles belong to this category --}}
                {{-- $category is a single instance of the Category model, articles() is the relationship method from the category model --}}
                
                
                    
                    <a class="grid grid-cols-3  shadow-md overflow-hidden  rounded-md space-x-2 justify-between" href="{{route('article', $article->slug)}}">
                        <img class="h-[250px] overflow-hidden w-full object-cover"
                            src="{{ asset(Storage::url($article->image)) }}" 
                            alt="image"
                        >

                        <div class="col-span-2 p-5">
                            <h3 class="line-clamp-3 text-2xl font-semibold my-2 line-clamp-2">
                                {{ $article->title }}
                            </h3>
                            <div class="text-md line-clamp-8">{!! $article->description !!}</div>
                            <div>
                                <i class="fa-regular fa-calendar-days"></i>
                                <small>{{toNepaliDate($article->created_at->format('Y-m-d'))}}</small>
                            </div>                          
                        </div>
                    </a>
                                    
                
                @endforeach

            </div>

            <div class=" ">
                @foreach ($advertises as $ad )
                    <a href="{{$ad->redirect_link}}" target="_blank">
                        <img class="h-[400px] rounded-md object-cover w-full hover:shadow-[#7171e1] shadow-md shadow-[gray]" src="{{asset(Storage::url($ad->banner))}}" alt="{{$ad->company_name}}">
                    </a>
                    
                @endforeach
            </div>
            </div>

        </div>
    </section>
</x-frontend-layout>