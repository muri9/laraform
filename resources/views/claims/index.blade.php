<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Claims
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
                            <th class="bg-blue-100 border px-4 py-4">Subject</th>
                            <th class="bg-blue-100 border px-4 py-4">Name</th>
                            <th class="bg-blue-100 border px-4 py-4">Email</th>
                            <th class="bg-blue-100 border px-4 py-4">Date</th>
                            <th class="bg-blue-100 border px-4 py-4">File</th>
                            <th class="bg-blue-100 border px-4 py-4">Read</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td class="border px-4 py-2">
                                    <a class="underline" href="{{route('claims.show', $item)}}">{{ $item->id }}</a>
                                </td>
                                <td class="border px-4 py-2">{{ $item->subject }}</td>
                                <td class="border px-4 py-2">{{ $item->user->name }}</td>
                                <td class="border px-4 py-2">{{ $item->user->email }}</td>
                                <td class="border px-4 py-2">{{ $item->created_at }}</td>
                                <td class="border px-4 py-2">
                                    @if (!empty($item->file))
                                    <a class="underline" href="{{ $item->file }}">file</a>
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    @if ($item->mark)
                                        ✔
                                    @else
                                        <a href="{{route('claims.mark', $item)}}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 p-1 rounded inline-flex items-center">
                                            <span>Mark as read</span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td>No claims</td></tr>
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
