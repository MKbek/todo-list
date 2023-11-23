<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Todo') }}
        </h2>
        <a href="{{ route('todo.index') }}" class='inline-flex items-center gap-1 pl-2 pr-3 py-1 bg-red-50 border border-transparent rounded-lg font-semibold text-sm text-red-600 tracking-widest hover:bg-red-100 active:bg-red-200 active:border-red-300 focus:outline-none transition ease-in-out duration-150 cursor-pointer'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rotate-45">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            {{ __('Cancel') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('todo.store') }}" method="post" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @csrf
                <div class="p-6 text-gray-900">
                    <div class="col-span-full">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="col-span-full mt-5">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="4" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-none"></textarea>
                        </div>
                    </div>
                    <div class="col-span-full mt-5">
                        <label for="reminder" class="block text-sm font-medium leading-6 text-gray-900">Reminder</label>
                        <div class="mt-2">
                            <input id="reminder" name="reminder" type="datetime-local" class="block w-44 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-none">
                        </div>
                    </div>
                    <div class="col-span-full mt-5 flex items-center gap-5">
                        <div class="relative flex gap-x-3">
                            <div class="flex h-6 items-center">
                                <input id="marked" name="marked" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:outline-none ring-0">
                            </div>
                            <div class="text-sm leading-6">
                                <label for="marked" class="font-medium text-gray-900">Marked</label>
                            </div>
                        </div>
                        <div class="relative flex gap-x-3">
                            <div class="flex h-6 items-center">
                                <input id="important" name="important" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:outline-none ring-0">
                            </div>
                            <div class="text-sm leading-6">
                                <label for="important" class="font-medium text-gray-900">Important</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <p class="mt-3 text-md leading-6 text-gray-600">
                            <x-primary-button class="mt-5 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                {{ __('Save') }}
                            </x-primary-button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
