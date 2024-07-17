<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{{ route('posts.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" value="{{ old('title') }}" class="mt-1 block w-full" autocomplete="title" />
                            <x-input-error :messages="$errors->createPost->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="slug" :value="__('Slug')" />
                            <x-text-input id="slug" name="slug" type="text" value="{{ old('slug') }}" class="mt-1 block w-full" autocomplete="slug" />
                            <x-input-error :messages="$errors->createPost->get('slug')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="content" :value="__('Content')" />
                            <x-text-area id="content" name="content" type="text" class="mt-1 block w-full" autocomplete="content" />
                            <x-input-error :messages="$errors->createPost->get('content')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'post-created')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Post created successfully!.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var titleInput = document.getElementById('title');
    var slugInput = document.getElementById('slug');

    titleInput.addEventListener('input', function() {
        var slug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
        slugInput.value = slug;
    });
});
</script>
