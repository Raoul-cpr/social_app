<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Document</title>
</head>

<body>
    <header>

        <h3 class="socialapp">Social App</h3>

    </header>
    <main>
        <div class="title">
            <p>SE CONNECTER</p>
        </div>

        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
        <div class="divContainer">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="email">Email:
                </label> <input type="email" name="email" id="email">
                <label for="password">Mot de passe:
                </label>
                <input type="password" name="password" id="password">
                <button type="submit">Connexion</button>
            </form>
            <a href="{{ route('registerview') }}">Vous n'avez pas de compte ? Créer un compte!</a>
        </div>
    </main>
</body>

</html>
