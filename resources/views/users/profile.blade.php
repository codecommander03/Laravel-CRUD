<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            color: black;
            margin-bottom: 30px;
            margin-left: 200px;
        }

        h1 {
            font-size: 18px;
            color: #444;
            margin-bottom: 10px;
        }

        h1:hover {
            color: black;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:focus {
            outline: none;
        }

        .sidebar {
            height: 100%;
            width: 200px;
            background-color: #f4f4f4;
            position: fixed;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            display: block;
        }
    </style>

<script>

function toggle() {
    if(document.getElementById("mySidebar").style.display == "block"){
        document.getElementById("mySidebar").style.display = "none"
    }
    else{
        document.getElementById("mySidebar").style.display = "block"
    }
}

</script>
</head>
<body>
    <div class="sidebar" style="display:none; margin-top: 37px" id="mySidebar">
        <a href="/users" class="">All Users</a>
        <a href="/users#create" class="">Create</a>
    </div>
    <button style="font-size: large; height: 32px; width: 38px; margin-top: 5px; margin-left: 5px; padding-left: 2px; padding-right: 0px; padding-top: 3px;" onclick="toggle()"><strong>☰</strong></button>
    
    <div class="container">
        

        <h2>User Details</h2>
        <h1>Id: {{$user->id}}</h1>
        <h1>Name: {{$user->name}}</h1>
        <h1>Email: {{$user->email}}</h1>
        <h1>Password: {{substr($user->password,0,10)."..."}}</h1>
        <h1>Created at: {{$user->created_at}}</h1>
        <h1>Updated at: {{$user->updated_at}}</h1>
        
        <hr>
        
        <div class="button-container">
            <form action="{{ route('users.edit', $user) }}" method="get">
                @csrf
                <button>Edit</button>
            </form>
            
            <form action="{{ route('users.destroy', $user) }}" method="post">
                @csrf
                @method('delete')
                <button>Delete User</button>
            </form>
        </div>
    </div>
</body>
</html>
