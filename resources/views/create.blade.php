<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <title>Laravel</title>

    @auth
        <div class="mt-20 mx-60 px-40">
            <form action="{{route('movies.store')}}" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-500 text-sm font-bold mb-2" for="title">
                    Title:
                </label>
                <input
                    class="bg-zinc-900 shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                    id="title" type="text" placeholder="Movie Title" name="title">
            </div>

            <div class="mb-4">
                <label class="block text-gray-500 text-sm font-bold mb-2" for="image">
                    Banner
                </label>
                <input type="file" class="text-gray-500" name="image" id="image">
            </div>

            <div class="mb-2">
                <label class="block text-gray-500 text-sm font-bold mb-2" for="content">
                    Description:
                </label>
                <textarea name="content" id="content" class="bg-zinc-900 w-full shadow rounded border text-gray-500" placeholder="Describe the Movie"></textarea>
            </div>

            <div class="mb-2">
                <label class="block text-gray-500 text-sm font-bold mb-2" for="rating_star">
                    Your Rating:
                </label>
                <input type='text' class="bg-zinc-900 shadow appearance-none border rounded py-2 px-3 leading-tight focus:outline-none focus:shadow-outline text-yellow-400" name="rating_star">
             </div>

            <div class="flex items-center justify-between pt-4">
                <button
                    class="bg-zinc-900 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Create Movie Page
                </button>
            </div>
            </form>
        </div>
    @endauth

</x-app-layout>
