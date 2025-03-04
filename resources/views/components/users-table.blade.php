<div class="mx-auto">
    <h1 class="text-3xl text-center font-bold mb-2">
        Registered Users
    </h1>
    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="table-auto text-left border-collapse bg-white dark:bg-black ">
            <thead class="bg-indigo-600">
                <tr>
                    <th class="p-1 font-semibold">Email</th>
                    <th class="p-1 font-semibold">Timezone</th>
                    <th class="p-1 font-semibold">Local Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="hover:bg-indigo-100 dark:hover:bg-gray-500 transition">
                    <td class="p-1 border-b border-gray-200">{{ $user->email }}</td>
                    <td class="p-1 border-b border-gray-200">{{ $user->timezone }}</td>
                    <td class="p-1 border-b border-gray-200">
                        {{ Carbon\Carbon::now($user->timezone)->toTimeString() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
