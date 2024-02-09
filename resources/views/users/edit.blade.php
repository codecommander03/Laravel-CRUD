<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form method="POST" action ="{{route('users.update',$user) }}">
            @csrf
            @method('patch')
            <label for="name">Name:</label><br>
            <input type="text" name="name" value={{ $user->name }}><br><br>
            @error('name')
                <p style="color: red">{{ $message }}</p>
            @enderror

            <label for="email">Email:</label><br>
            <input type="email" name="email" value={{ $user->email }}><br><br>
            @error('email')
                <p style="color: red">{{ $message }}</p>
            @enderror

            <label for="password">Password:</label><br>
            <input type="password" name="password" value={{ $user->password }}><br><br>
            @error('password')
                <p style="color: red">{{ $message }}</p>
            @enderror

            <button>Submit</button>
        </form>
    </div>
</body>
</html>