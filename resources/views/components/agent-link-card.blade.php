@props(['agents','property'])
<div class="bg-gray-100 border-gray-200 border-2 mb-4 rounded-full">
    <div class="mt-4 pl-4 pb-2">
        <h2 class="text-xl mb-3 pl-10">
            {{ $property->name }}
        </h2>

        <h3 class="pl-10">Available Agents</h3>

        <div class="ml-20 mt-3">
            <ul class="mb-3">
                    <form method="POST" action="/agent/link" class=" mb-2">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <select name="agent_id" class="ml-10">
                            @foreach ($agents as $agent)
                                <option value={{ $agent->id }} }}>{{ $agent->first_name }} {{ $agent->last_name }}</option>
                            @endforeach
                        </select>

                        <select name="role" class="ml-10">
                            <option value="Viewing">Viewing</option>
                            <option value="Selling">Selling</option>
                        </select>

                        <button type="submit" class="ml-10 bg-blue-500 ml-3 rounded-full font-semibold text-white px-3 py-1">Link</button>
                    </form>
            </ul>
        </div>
    </div>
</div>
