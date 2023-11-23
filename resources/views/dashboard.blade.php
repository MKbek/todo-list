@php use Illuminate\Support\Str; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo List') }}
        </h2>
        <a href="{{ route('todo.create') }}"
           class='inline-flex items-center gap-1 pl-2 pr-3 py-1 bg-zinc-50 border border-transparent rounded-lg font-semibold text-sm text-black tracking-widest hover:bg-zinc-100 active:bg-zinc-200 active:border-zinc-300 focus:outline-none transition ease-in-out duration-150 cursor-pointer'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>
            {{ __('Add new') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full divide-y divide-zinc-200">
                    <thead class="h-10">
                    <tr class="divide-x divide-zinc-200">
                        <th class="w-14">&ensp;</th>
                        <th>Task</th>
                        <th class="w-32">Marked</th>
                        <th class="w-32">Important</th>
                        <th class="w-32">Reminder at</th>
                        <th class="w-32">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todos as $todo)
                        <tr class="divide-x divide-zinc-200">
                            <td>
                                <form action="{{ route('todo.update', $todo->id) }}" method="post" class="w-full h-full flex items-center justify-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="checkbox" class="hidden" name="important" {{ $todo->important ? 'checked' : null }}>
                                    <input type="checkbox" class="hidden" name="marked" {{ $todo->marked ? 'checked' : null }}>
                                    <div class="flex h-6 items-center">
                                        <input id="completed" name="completed" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" {{ $todo->completed ? 'checked' : null }} onchange="this.form.submit()">
                                    </div>
                                </form>
                            </td>
                            <td>
                                <div class="flex flex-col items-start justify-start px-4 py-2">
                                    <div class="text-md font-semibold">{{ $todo->title }}</div>
                                    <div class="text-xs text-zinc-400">{{ Str::limit($todo->description, 50) }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    @if($todo->marked)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-orange-400">
                                            <path fill-rule="evenodd" d="M3 2.25a.75.75 0 01.75.75v.54l1.838-.46a9.75 9.75 0 016.725.738l.108.054a8.25 8.25 0 005.58.652l3.109-.732a.75.75 0 01.917.81 47.784 47.784 0 00.005 10.337.75.75 0 01-.574.812l-3.114.733a9.75 9.75 0 01-6.594-.77l-.108-.054a8.25 8.25 0 00-5.69-.625l-2.202.55V21a.75.75 0 01-1.5 0V3A.75.75 0 013 2.25z" clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-orange-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                                        </svg>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    @if($todo->important)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-red-600">
                                            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                        </svg>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    @if($todo->reminder_at)
                                        <div class="text-lg">{{ $todo->reminder_at }}</div>
                                    @else
                                        <i class="text-lg">Not set</i>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    <a href="{{ route('todo.edit', $todo->id) }}" class="inline-flex items-center gap-2 pl-2 pr-3 py-1 bg-none border border-transparent rounded-lg font-semibold text-sm text-blue-600 tracking-widest hover:bg-blue-100 active:bg-blue-200 active:border-blue-300 focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                        </svg>
                                        Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
