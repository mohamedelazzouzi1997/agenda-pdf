<div>

    <div class="w-full flex pb-10">
        <div class="w-3/6 mx-1">
            <input wire:model.debounce.300ms="search" type="text"
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search events...">
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model="sortField"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="id">ID</option>
                <option value="name">Name</option>
                <option value="email">Email</option>
                <option value="created_at">Sign Up Date</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model="sortAsc"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="1">Ascending</option>
                <option value="0">Descending</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model="status"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value='1' selected>status</option>
                <option value="admin">admin</option>
                <option value="super admin">super admin</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model="perPage"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="10">10</option>
                @if ($Eventcount > 25)
                    <option value="25">25</option>
                @endif
                @if ($Eventcount > 50)
                    <option value="50">50</option>
                @endif
                @if ($Eventcount > 100)
                    <option value="100">100</option>
                @endif
                <option value="{{ $Eventcount }}">show all events</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1">
            <button wire:click="deleteevents"
                class="hover:bg-indigo-500 block appearance-none w-full bg-red-500 border border-gray-200 text-white py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500">Delete</button>
        </div>
    </div>
    <div class="w-1/6 mx-1 block">
        {{ $perPage }} User of : {{ $Eventcount }}
    </div>
    @if ($events->isNotEmpty())
        <table class="table-auto w-full mb-6">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">title</th>
                    <th class="px-4 py-2">description</th>
                    <th class="px-4 py-2">status</th>
                    <th class="px-4 py-2">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>

                        <td class="border px-4 py-2">{{ $event->id }}</td>
                        <td class="border px-4 py-2">{{ $event->title }}</td>
                        <td class="border px-4 py-2">{{ $event->description }}</td>
                        <td class="border px-4 py-2">{{ $event->status }}</td>
                        <td class="border px-4 py-2">{{ $event->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {!! $events->links() !!}
    @else
        <p class="text-center">Whoops! No events were found 🙁</p>
    @endif
