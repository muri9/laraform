<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Roles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="bg-white w-full">
                        <thead>
                        <tr>
                            <th class="bg-blue-100 border px-4 py-4">#</th>
                            <th class="bg-blue-100 border px-4 py-4">Code</th>
                            <th class="bg-blue-100 border px-4 py-4">Title</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item->id }}</td>
                                <td class="border px-4 py-2">{{ $item->code }}</td>
                                <td class="border px-4 py-2">{{ $item->title }}</td>
                            </tr>
                        @empty
                            <tr><td>No items</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="pt-4">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
