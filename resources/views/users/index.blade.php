<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
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
                            <th class="bg-blue-100 border px-4 py-4">Name</th>
                            <th class="bg-blue-100 border px-4 py-4">Email</th>
                            <th class="bg-blue-100 border px-4 py-4">Date</th>
                            <th class="bg-blue-100 border px-4 py-4">Roles</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td class="border px-4 py-2">
                                    <a class="underline" href="{{route('users.show', $item)}}">{{ $item->id }}</a>
                                </td>
                                <td class="border px-4 py-2">{{ $item->name }}</td>
                                <td class="border px-4 py-2">{{ $item->email }}</td>
                                <td class="border px-4 py-2">{{ $item->created_at }}</td>
                                <td class="border px-4 py-2">
                                    <ul>
                                    @foreach($item->roles as $role)
                                        <li>{{$role->title}}</li>
                                    @endforeach
                                    </ul>
                                </td>
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
