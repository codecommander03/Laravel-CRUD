<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.w3-sidebar {
    height: 100%;
    width: 200px;
    background-color: #f4f4f4;
    position: fixed;
    overflow-x: hidden;
    padding-top: 20px;
}

.w3-sidebar a {
    padding: 10px;
    text-decoration: none;
    display: block;
}

.w3-sidebar a:hover {
    background-color: #ddd;
}

.table-container {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.center {
    text-align: center;
}

.form-container {
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    margin-left: 320px;
    padding-left: 140px;
}

.form-container label {
    width: 100px;
    display: inline-block;
    text-align: right;
    font-weight: 500;
}

.form-container input[type="text"],
.form-container input[type="email"],
.form-container input[type="password"] {
    width: calc(100% - 120px);
    padding: 8px;
    margin-left: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-container button {
    width: 100%;
    background-color: #4caf50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-container button:hover {
    background-color: #45a049;
}

svg {
    height: 1px;
    width: 1px;
}

#pagination {
    margin-top: 20px;
    margin-left: 500px;
}

</style>

<script>

function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

</script>

<body>
    <div class="container" style="background-color: white;">

        <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
            <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
            <a href="#" class="w3-bar-item w3-button">1</a>
            <a href="#" class="w3-bar-item w3-button">2</a>
            <a href="#" class="w3-bar-item w3-button">3</a>
        </div>
        <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>

<!---------------------------             1           ------------------------------------>

    <div class="center"><h1>USERS</h1></div>

    <table style="width:50%;" class="">
        <tr>
            <td><strong>Id</strong></td>
            <td><strong>Name</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Password</strong></td>
            <td><strong>Created_at</strong></td>
            <td><strong>Updated_at</strong></td>
            <td><strong>Edit / Delete</strong></td>
        </tr>
        @foreach($users as $user)
            <tr>
            <td><a href="/users/{{ $user->id }}">{{ $user->id }}</a></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ substr($user->password,0,55) }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td style>
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

    <div id="pagination">{{ $users->links() }}</div>
    <br>

    <!-----------------------                 2                -------------------------->

    <div class="form-container" style="width:40%; border-style: double; border: radius 2px;">
        
        <div class="center" style="width:60%">
            <h1>Create a new User</h1>
            <form method="POST" action ="{{ route('users.store') }}" style="margin: auto;" class="center">
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

                <button class="center">Submit</button>
            </form>
        </div>
        <br>
    </div>
    </div>
</body>
</html>