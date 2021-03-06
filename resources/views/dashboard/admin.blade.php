<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-nav-link :href="route('users.index')">
                        Users
                    </x-nav-link>
                    <x-nav-link :href="route('roles.index')">
                        Roles
                    </x-nav-link>
                    <x-nav-link :href="route('claims.index')">
                        Claims list
                    </x-nav-link>
                    <x-nav-link :href="route('claims.create')">
                        Add claim
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
