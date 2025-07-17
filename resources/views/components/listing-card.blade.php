@props(['listing'])
{{-- @include('components/li-item') --}}
<x-card>
    <div class="flex">
        <img class="hidden w-48 h-32 mr-6 md:block" src="{{ asset($listing->image ? 'storage/' . $listing->image : 'images/no-image.png') }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                <x-li-item :tagsCsv="$listing->tags"/>
            <div class="text-lg mt-4"><i class="fa-solid fa-location-dot"></i> {{$listing->location}}</div>
        </div>
    </div>
</x-card>

