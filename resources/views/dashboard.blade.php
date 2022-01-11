<x-layout>
    <main class=""mt-20>
        <div class="max-w-6xl mx-autolg:mt-30 ml-20">
            <ul>
                @foreach ($properties as $property)
                <li class="pt-3">
                    {{ $property->name }}
                </li>
                @endforeach

            </ul>
        </div>
</main>
</x-layout>
