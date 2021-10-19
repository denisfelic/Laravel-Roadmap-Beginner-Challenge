<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Article') }}
        </h2>
    </x-slot>

    <div class="py-12 grid place-items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('article_manager.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col">
                    <div class="flex flex-col">
                        <input class="rounded" id="title" type="text" name="title" placeholder="Article title">
                        @error('title')
                            <div class="p-1 bg-red-200 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col mt-2">
                        <textarea class="rounded" name="full_text" id="full_text" cols="50" rows="10"
                            placeholder="Article Text"></textarea>
                        @error('full_text')
                            <div class="p-1 bg-red-200 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-between flex-col mt-2">
                        <label for="image">Choose an image for the article</label>
                        <input type="file" name="image" id="image">
                        @error('image')
                            <div class="p-1 bg-red-200 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    @if (sizeof($categories) < 1)
                        <p>You have no one category yet, <a class="text-blue-500" href="#">create new here</a></p>
                    @else
                        <div>
                            <label for="category">Select a Article Category</label>
                            <select name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <button class="border p-2 bg-green-500 rounded text-white mt-2">Create new Article</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>