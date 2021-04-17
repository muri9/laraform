<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User {{ $item->id }}
        </h2>
        <x-nav-link :href="route('users.index')">
            <- list
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
                            <td class="border px-2 py-1">{{ $item->id }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-right">Name</td>
                            <td class="border px-2 py-1">{{ $item->name }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-right">Email</td>
                            <td class="border px-2 py-1">{{ $item->email }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-right">Date</td>
                            <td class="border px-2 py-1">{{ $item->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-right">Roles</td>
                            <td class="border px-2 py-1">
                                <ul>
                                    @foreach($item->roles as $role)
                                        <li>{{$role->title}}</li>
                                    @endforeach
                                    <li>
                                        <select name="role" id="role_dd"
                                                onchange="document.getElementById('assign_btn').disabled = this.value.length <= 0">
                                            <option disabled selected value>-- select role --</option>
                                            @foreach($roles as $role)
                                            <option value="{{route('users.role', [$item, $role], false)}}">{{$role->title}}</option>
                                            @endforeach
                                        </select>
                                        <button
                                            onclick="window.location.href = (document.getElementById('role_dd').value)"
                                            id="assign_btn" disabled type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Toggle role
                                        </button>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
