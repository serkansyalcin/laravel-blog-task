<x-public-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex mb-4">
                    <img class="w-12 h-12 rounded-full" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" />
                    <div class="ml-3 mt-0.5">
                        <span class="block font-medium text-base leading-snug text-black dark:text-gray-800">{{$post->user()->first()->name}}</span>
                        <span class="block text-sm text-gray-800 dark:text-gray-800 font-light leading-snug">{{$post->created_at}}</span>
                    </div>
                </div>

                <div class="px-5 py-4 bg-white dark:bg-gray-100">
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
<style>
        h2,h2,h3,h4,h5,h6 {
            font-size: 22px;
        }
    </style>
