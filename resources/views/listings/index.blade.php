<x-layout>
@include('partials/_hero')
@include('partials/_search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @if (!count($listings)) <h1>No Listings Found</h1>
    @else 
        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing"/>
        @endforeach
    @endif
    </div>

    <div class="mr-5 mt-20">{{ $listings->links(); }}</div>
</x-layout>

