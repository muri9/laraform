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
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">{{ $claim->id }}</th>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Subject</td>
                            <td class="border px-4 py-2">{{ $claim->subject }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Message</td>
                            <td class="border px-4 py-2">{{ $claim->message }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
