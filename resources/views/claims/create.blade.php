<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Claim
        </h2>
        <x-nav-link :href="route('claims.index')">
            <- Claims list
        </x-nav-link>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('claims.store') }}" method="post">
                        @csrf
                        <fieldset>
                            <div>
                                <x-label for="subject">Subject</x-label>
                                <x-input id="subject" type="text" name="subject" required autofocus/>
                            </div>
                            <div>
                                <x-label for="subject">Message</x-label>
                                <x-textarea id="message" name="message"
                                            required></x-textarea>
                            </div>
                            <x-button class="ml-3">Add</x-button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
