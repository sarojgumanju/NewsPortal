<x-frontend-layout title="{{$article->meta_title}}" keywords="{{$article->meta_keyword}}" description="{{$article->meta_description}}" image="{{asset(Storage::url($article->image))}}">
    <article class="py-8">
        <div class="container mx-auto grid grid-cols-3 gap-y-10 gap-x-8">

            <div class="col-span-2 space-y-5">

                <div>
                    <span class="font-bold text-xl">Author: {{$article->author}}</span>
                </div>
                <div class="flex items-center gap-x-2 bg-blue-200 w-[200px] justify-center rounded-md border-md p-2">
                                <i class="fa-regular fa-calendar-days"></i>
                                <p>{{toNepaliDate($article->created_at->format('Y-m-d'))}}</p>
                                
                 </div> 
                 <h3 class=" text-3xl font-semibold my-2 line-clamp-2">
                                {{ $article->title }}
                 </h3>
                    
                    <div class="grid  shadow-md overflow-hidden  rounded-md space-x-2 justify-between">
                        <img class="h-auto overflow-hidden w-full object-cover" loading="lazy"
                            src="{{ asset(Storage::url($article->image)) }}" 
                            alt="image"
                        >

                        <div class=" p-5">
                            <h3 class=" text-3xl font-semibold my-2 line-clamp-2">
                                {{ $article->title }}
                            </h3>
                            <p class="text-xl ">{!! $article->description !!}</p>
                            <div class="flex items-center gap-x-2 bg-blue-200 w-[200px] justify-center rounded-md border-md p-2">
                                <i class="fa-regular fa-calendar-days"></i>
                                <p>{{toNepaliDate($article->created_at->format('Y-m-d'))}}</p>
                            </div>                          
                        </div>
                    </div>

            </div>

            <aside class=" ">
                @foreach ($advertises as $ad )
                    <a href="{{$ad->redirect_link}}" target="_blank">
                        <img class="h-[400px] rounded-md object-cover w-full hover:shadow-[#7171e1] shadow-md shadow-[gray]" src="{{asset(Storage::url($ad->banner))}}" alt="{{$ad->company_name}}">
                    </a>
                    
                @endforeach
            </aside>

        </div>
    </article>
</x-frontend-layout>