<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Claim
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')"/>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('claims.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div>
                                <x-label for="subject">Subject</x-label>
                                <x-input id="subject" type="text" name="subject" class="w-full"
                                         required autofocus></x-input>
                            </div>
                            <div class="pt-4">
                                <x-label for="subject">Message</x-label>
                                <x-textarea id="message" name="message" class="w-full"
                                            required></x-textarea>
                            </div>
                            <div class="pt-4">
                                <input class="form-control" type="file" name="file">
                            </div>
                            <div class="pt-4">
                                <x-button class="form-control">Submit</x-button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
