<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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

        .sidebar a:hover {
            background-color: #ddd;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 15px 50px;
        }

        button:hover {
            background-color: #0056b3;
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
    <div>
        <div class="sidebar" style="display:none; margin-top: 37px" id="mySidebar">
            <a href="/users" class="">All Users</a>
            <a href="/users#create" class="">Create</a>
        </div>
        <button style="font-size: large; height: 32px; width: 38px; margin-top: 5px; margin-left: 5px; padding-left: 2px; padding-right: 0px; padding-top: 3px;" onclick="toggle()"><strong>☰</strong></button>
        
        <form method="POST" action="{{ route('users.update',$user) }}">
            @csrf
            @method('patch')
            <label for="name">Name:</label><br>
            <input type="text" name="name" value="{{ $user->name }}"><br>
            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <label for="email">Email:</label><br>
            <input type="email" name="email" value="{{ $user->email }}"><br>
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <label for="password">Password:</label><br>
            <input type="password" name="password" value="{{ $user->password }}"><br>
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <button>Submit</button>
        </form>
    </div>
</body>
</html>
