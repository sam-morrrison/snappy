@props(['property'])

<div class="flex-1 flex flex-col justify-between  bg-gray-100 border-gray-200 border-2 mb-4 rounded-full">

    <div class="mt-4 pl-4 pb-2">
        <div class="grid grid-cols-3 gap-4 content-start ">
            <h2 class="text-xl mb-3 pl-10">
                {{ $property->name }}
            </h2>

            <a href="/properties/{{ $property->id }}" class= "bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 text-center">
                Link This Property to an Agent
            </a>

        </div>

        <div class="mt-5 pl-20">
            Price £ {{ number_format($property->price,0,".",",")}} - ({{ $property->type }})
        </div>

        <div class="ml-20 mt-3 text-sm">
            <ul class="mb-3">
                @foreach ($property->agents as $agent)
                    <li class="mb-2"> {{ $agent->first_name }} {{ $agent->last_name }} ({{ $agent->pivot->role }})</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
