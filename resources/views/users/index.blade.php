<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>

table, td {
  border:1px solid black;
  font-weight: 600;
}

table {
    margin: auto;
}

svg {
    height: 1rem;
    width: 1rem;
}

.danger {
    color: red;
}

.center {
    margin: auto;
}


label,input {
  /* In order to define widths */
  display: inline-block;
}

label {
  width: 30%;
  /* Positions the label text beside the input */
  text-align: right;
}

label+input {
  width: 30%;
  /* Large margin-right to force the next element to the new-line
           and margin-left to create a gutter between the label and input */
  margin: 0 30% 0 4%;
}


/* Only the submit button is matched by this selector,
       but to be sure you could use an id or class for that button */

input+input {
  float: right;
}

button {
    margin: auto;
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

    <h1>Users</h1>

    <table style="width:50%;" class="">
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

    <div class="">{{ $users->links() }}</div>
    <br>

    <!-----------------------                 2                -------------------------->

    <div class="center" style="width:45%; border-style: double; border: radius 2px;">
        
        <div class="center" style="width:55%">
            <h1>Create a new User</h1>
            <form method="POST" action ="{{route('users.store') }}" style="margin: auto;" class="center">
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
        </div>
        <br>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    </div>
</body>
</html>