<x-frontend-layout>
    <section class="py-8">
        <div class="container mx-auto shadow-md p-5 space-x-2 rounded-lg">
           
                <a href="" class="">
                    <h1 class="text-4xl font-bold text-red-400">
                        {{$latest_article->title}}
                    </h1>
                </a>
                <img src="{{asset(Storage::url($latest_article->image))}}" alt="latest_image">   
                
        </div>
    </section>

    <section class="py-8">
        <div class="container mx-auto p-5 space-y-8">
            
            @foreach ($categories as $category)

                @php
                    $lat_cat_article = $category->articles()->latest()->first();
                    $other_articles = $category->articles()->latest()->skip(1)->take(4)->get();
                @endphp

                

                    <div>
                        <h2 class="mb-4 text-3xl border-l-4 border-orange-500 text-orange-500 pl-4 font-semibold">
                            {{ $category->title }}
                        </h2>

                        <div class="grid grid-cols-3 space-x-3">

                            <div class="col-span-2 p-4 shadow-md rounded-md">
                                <a href="">
                                    <img 
                                        src="{{ asset(Storage::url($lat_cat_article->image)) }}" 
                                        alt="image"
                                    >

                                    <h3 class="text-xl font-semibold my-2 line-clamp-2">
                                        {{ $lat_cat_article->title }}
                                    </h3>

                                    <p class="text-sm line-clamp-2">{!! $lat_cat_article->description !!}</p>
                                </a>
                            </div>

                            <div class="space-y-4">
                                @if (count($other_articles) > 0)
                                
                                @foreach ($other_articles as $article)
                                    <a class="grid grid-cols-3 space-x-2 items-center shadow-md rounded-md overflow-hidden" href="">
                                    <img 
                                        class="pr-2 h-[86px] w-full object-cover" 
                                        src="{{asset(Storage::url($article->image))}}" 
                                        alt="other_article"
                                    >

                                    <div class="flex flex-col justify-between col-span-2">
                                        <h4 class="font-bold line-clamp-2">
                                            {{$article->title}}
                                        </h4>

                                        <div>
                                            <i class="fa-regular fa-calendar-days"></i>
                                            <small>{{toNepaliDate($article->created_at->format('Y-m-d'))}}</small>
                                        </div>
                                    </div>
                                </a>                                    
                                @endforeach

                                @else
                                    <div class="shadow-md rouunded-md">
                                        <h4>NO other articles found.</h4>
                                    </div>

                                @endif
                            </div>

                        </div>
                    </div>

               

            @endforeach

        </div>
</section>  

</x-frontend-layout>