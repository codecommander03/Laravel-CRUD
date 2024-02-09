<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Id -> {{$user->id}}</h2>
    <h1>Name -> {{$user->name}}</h1>
    <h1>Email -> {{$user->email}}</h1>
    <h1>Password -> {{$user->password}}</h1>
    <h1>Created at -> {{$user->created_at}}</h1>
    <h1>Updated at -> {{$user->updated_at}}</h1>
    
    <hr>
    
    <form action="{{ route('users.destroy', $user) }}" method="post" >
        @csrf
        @method('delete')
        <button>Delete</button>
    </form>
</body>
</html>