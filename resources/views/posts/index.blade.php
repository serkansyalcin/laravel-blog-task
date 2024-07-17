<x-public-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                          <table class="min-w-full">
                            <thead class="bg-white border-b">
                              <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  Title
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  Content
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-gray-100' }} border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $post->id }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('posts.show', $post->slug) }}" class="text-indigo-600 hover:text-indigo-900">
                                                {{ $post->title }}
                                            </a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ Str::limit($post->content, 150) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    {{ $posts->links() }}
                  </div>
            </div>
        </div>
    </div>
</x-public-layout>
