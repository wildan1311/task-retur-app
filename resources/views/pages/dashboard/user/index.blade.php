<x-dashboard-layout>
    <div class="w-100 card my-2">
        <div class="card-header">
            <h3>User</h3>
        </div>
        <div class="card-body">
            <div class="my-2">
                <a href="{{ route('dashboard.user.create') }}" class="btn btn-primary">Tambah User</a>
            </div>
            <table class="table ">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="h-1">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td >{{ $user->name }}</td>
                            <td >{{ $user->email }}</td>
                            <td >{{ $user->role }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('dashboard.user.edit', $user->id)}}">Update Role</a>
                                <form action="{{route('dashboard.user.destroy', $user->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
