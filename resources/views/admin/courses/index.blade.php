<x-app-layout>
    <x-slot name="header">
        <div class="flex justify justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Course platform') }}
            </h2>

            <a href="{{ route('courses.create') }}">
                <button
                    class="float-right flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                    type="submit">
                    Create
                </button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="font-medium text-sm bg-green-100 text-green-600 dark:text-green-400 p-5">
                    {{ session('success') }}

                </div>
            @endif
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-12">
                    <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Course ID
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Credits
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Teacher
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($courses as $course)
                                    <tr>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            {{ $course->id }}
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            {{ $course->name }}
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            {{ $course->credits }}
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            {{ $course->teacher->name }}
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            {{ $course->created_at }}
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        </th>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <a href="{{ route('courses.show', $course) }}"
                                                class="text-gray-600 hover:text-gray-900">

                                                View
                                            </a>

                                            <a href="{{ route('courses.edit', $course) }}"
                                                class="text-indigo-600 hover:text-indigo-900">
                                                Edit
                                            </a>

                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                    Delete
                                                </button>
                                            </form>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $courses->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
