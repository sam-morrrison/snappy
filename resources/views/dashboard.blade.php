<x-layout>
    <main class=""mt-20>
        <div class="max-w-6xl mx-autolg:mt-30 ml-20">
            @foreach ($properties as $property)
                <x-property-card :property="$property" />
            @endforeach
            </table>
        </div>
    </main>
</x-layout>
