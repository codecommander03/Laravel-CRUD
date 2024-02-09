<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>

table, th, td {
  border:1px solid black;
}

svg {
    height: 1rem;
    width: 1rem;
}

.danger {
    color: red;
}

.center {
    display: flex;
    align-items: center;
}


</style>

<body>
    <div class="container">
        <h1>Users</h1>

    <table style="width:90%">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Created_at</td>
            <td>Updated_at</td>
            <td>Edit / Delete</td>
        </tr>
        @foreach($users as $user)
            <tr>
            <td><a href="/users/{{ $user->id }}">{{ $user->id }}</a></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td class="center">
                <form action="{{ route('users.edit', $user) }}" method="get">
                    @csrf
                    <button >Edit</button>
                </form>

                <form action="{{ route('users.destroy', $user) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </td>
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}
    <br>

    <div class="" style="width:28%; border-style: double">
        <h1>Create a new User</h1>
        <form method="POST" action ="{{route('users.store') }}">
            @csrf

            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="aditya">
            @error('name')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <br><br>

            
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="aditya@gmail.com">
            @error('email')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="12345678">
            @error('password')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <br><br>

            <button>Submit</button>
        </form>
        <br>
    </div>

    </div>
</body>
</html>