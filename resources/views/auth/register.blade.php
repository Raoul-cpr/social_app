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
            <p>S'ENREGISTRER</p>
        </div>
        @foreach ($errors->all() as $error)
            <p> {{ $error }}</p>
        @endforeach
        <div class="divContainer">
            <form action="{{ route('register') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <label for="firstName">Prenom :
                </label>
                <input type="text" name="firstName" id="firstName">
                <label for="lastName">Nom :
                </label>
                <input type="text" name="lastName" id="lastName">
                <label for="photo">Choisissez une photo de profile</label>
                <input type="file" name="photo" class="photo" id="photo" accept="image/*">
                <label for="email">Email :
                </label>
                <input type="email" name="email" id="email">
                <label for="password">Mot de passe:
                </label>
                <input type="password" name="password" id="password">
                <label for="location">Votre addresse :
                </label>
                <input type="text" name="location" id="location">
                <label for="job">Votre travail :
                </label>
                <input type="text" name="job" id="job">
                <button type="submit">Créer son compte</button>
            </form>
            <a href="{{ route('loginview') }}">Vous avez un compte ? Connecter vous !</a>
        </div>
    </main>
</body>

</html>
