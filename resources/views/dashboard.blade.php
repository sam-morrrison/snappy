<x-layout>
    <div class="mt-8 md:mt-0 flex items-center">
        <a href="/agent" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Add Agent
        </a>
    </div>

    <main class=""mt-20>

        <div class="max-w-6xl mx-autolg:mt-30 ml-20 mt-10">
            @foreach ($properties as $property)
                <x-property-card :property="$property" />
            @endforeach
            </table>
        </div>
    </main>
</x-layout>
