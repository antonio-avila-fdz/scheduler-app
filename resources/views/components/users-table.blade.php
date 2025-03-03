<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <h1 class="text-5xl text-center font-bold">Registered users</h1>
    <div class="my-6">
        <table class="table-auto">
            <thead class="border-b-gray-100 border-2">
                <th>Email</th>
                <th>Timezone</th>
                <th>Local Time</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->timezone }}</td>
                    <td>
                        {{ Carbon\Carbon::now($user->timezone)->toTimeString() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>