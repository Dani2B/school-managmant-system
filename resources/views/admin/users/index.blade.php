<x-app-layout>
    <x-slot name="header">
        <div class="flex justify justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users Index') }}
            </h2>

            <a href="{{ route('users.create') }}">
                <button
                    class="float-right flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                    type="submit">
                    Create
                </button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        @if (session('success'))
            <div class="font-medium text-sm bg-green-600 dark:text-green-400">
                {{ session('success') }}

            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex flex-row justify-between w-full mb-1 sm:mb-0">
                        <h2 class="text-2xl leading-tight">
                            Users
                        </h2>
                        <div class="text-end">
                            <form
                                class="flex flex-col justify-center w-3/4 max-w-sm space-y-3 md:flex-row md:w-full md:space-x-3 md:space-y-0">
                                <div class=" relative ">
                                    <input type="text" id="&quot;form-subscribe-Filter"
                                        class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        placeholder="name" />
                                </div>
                                <button
                                    class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                                    type="submit">
                                    Filter
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            User name
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Role
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Birthdate
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Created at
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            {{ $user->name }}
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            {{ $user->role }}
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            {{ $user->date_of_birth }}
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            {{ $user->created_at }}
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        </th>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
