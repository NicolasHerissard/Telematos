<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>

    <h1>Register</h1>

    <form action="{{ route('registerUser') }}" method="post">
        @csrf
        
        <input type="text" placeholder="Nom" name="name">

        <input type="email" placeholder="Email" name="email">

        <input type="password" name="password" placeholder="Password">

        <button type="submit">Enregistrer</button>
    </form>
    
</body>
</html>