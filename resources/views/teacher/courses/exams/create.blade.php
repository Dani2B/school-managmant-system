<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex justify justify-between align-middle">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $course->name }}
                </h2>
            </div>
            <div>
                <a href="{{ route('teacher.courses.exams.create', $course) }}"></a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        @if (session('success'))
            <div class="font-medium text-sm bg-green-50 text-green-600 dark:text-green-400 p-4">
                {{ session('success') }}

            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-form.create title="Create Exam" route="{{route('teacher.courses.exams.store', $course)}}">
                <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                        autofocus autocomplete="title" /> 
                    <x-input-error :messages="$errors->get('text')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="text" :value="__('Status')" />
                    <x-select name="Status" :option="\App\Enum\ExamStatus::cases()"/>
                </div>
                </div>
            

            <form class="bg-white p-6" method="POST" action="{{route('teacher.courses.exams.store', $course)}}">
                @csrf
                
               <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-input-label for="text" :value="__('Start')" />
                    <x-text-input id="start" class="block mt-1 w-full" type="datetime-local" name="start" :value="old('start')"
                        autofocus autocomplete="start" /> 
                
                </div>
                <div>
                    <x-input-label for="text" :value="__('End')" />
                    <x-text-input id="end" class="block mt-1 w-full" type="datetime-local" name="end" :value="old('end')"
                        autofocus autocomplete="end" /> 
            
                </div>
            </div>
               
                    <div>
                        <x-input-label for="text" :value="__('Description')" />
                        <x-textarea name="description" />
                      
                    </div>
                
            </x-form.create>
            
        </form>
            <button type="submit">Submit</button>

 
    </div>
</x-app-layout>
