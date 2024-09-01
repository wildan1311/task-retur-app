<x-dashboard-layout>
    <div class="w-100 card">
        <div class="card-header">
            <h3>Edit User</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                        <option value="gudang" {{$user->role == 'gudang' ? 'selected' : ''}}>Gudang</option>
                        <option value="pengiriman" {{$user->role == 'pengiriman' ? 'selected' : ''}}>Pengiriman</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
    </div>
</x-dashboard-layout>
