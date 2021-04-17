<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Claim
        </h2>
        <x-nav-link :href="route('claims.index')">
            <- Claims list
        </x-nav-link>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')"/>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <table class="bg-white">
                        <tr>
                            <td class="border px-2 py-1 text-right">ID</td>
                            <td class="border px-2 py-1">{{ $claim->id }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-right">Date</td>
                            <td class="border px-2 py-1">{{ $claim->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-right">Name</td>
                            <td class="border px-2 py-1">{{ $claim->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-right">Email</td>
                            <td class="border px-2 py-1">{{ $claim->user->email }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-right">Subject</td>
                            <td class="border px-2 py-1">{{ $claim->subject }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-right">Message</td>
                            <td class="border px-2 py-1"><span>{{ $claim->message }}</span></td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-right">Read</td>
                            <td class="border px-2 py-1">
                                @if ($claim->mark)
                                    ✔
                                @else
                                    <a href="{{route('claims.mark', $claim)}}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 p-1 rounded inline-flex items-center">
                                        <span>Mark as read</span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
