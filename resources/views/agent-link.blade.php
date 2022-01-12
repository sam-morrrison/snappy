<x-layout>
    <div class="mt-8 md:mt-0 flex items-center mb-10">
        <a href="/" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Property List
        </a>
    </div>

    <main>
        <div class="max-w-6xl mx-autolg:mt-40 ml-20">
            <x-agent-link-card :agents="$agents" :property="$property"/>
        </div>
    </main>
</x-layout>
