<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Social App</title>
</head>

<body>
    {{-- Header --}}
    <header>
        <div class="searchblock">
            <h3 class="socialapp">Social App</h3>
            <input class="search" type="text" placeholder="search..." name="search">
        </div>
        <div class="nav">
            <a><i class="far fa-message"></i></a>
            <a> <i class="far fa-moon"></i></a>
            <a> <i class="far fa-bell"></i></a>
            <select name="option" id="option" onchange="logoutFunction()">
                <option value=" {{ auth()->user()->firstName }} {{ auth()->user()->lastName }}">
                    {{ auth()->user()->firstName }} {{ auth()->user()->lastName }}
                </option>
                <option value="logout">
                    Se déconnecter
                </option>

            </select>
        </div>
    </header>
    <main>
        {{-- Formulaire pour la deconnexion --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div class="bodyContainer1">
            <div class="title">
                <div class="name">
                    <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="">
                    <div class="ami">
                        <h4>
                            {{ auth()->user()->firstName }} {{ auth()->user()->lastName }}
                        </h4>
                        <p>0 amis</p>

                    </div>

                </div>

                <i class="far fa-circle-user"></i>
            </div>
            <hr>
            <div class="personal"> <i class="fa fa-location-dot"></i>
                <p> {{ auth()->user()->location }}</p>
            </div>
            <div class="personal"> <i class="fa fa-briefcase"></i>
                <p> {{ auth()->user()->job }}</p>
            </div>
            <hr>
            <div class="post">
                <div>
                    <p>Nombre de vu de votre profile</p>
                    <p>{{ random_int(1, 1000000) }}</p>
                </div>
                <br>
                <div>
                    <p>Les impressions de votre dernier poste</p>
                    <p>{{ random_int(1, 1000000) }}</p>
                </div>
            </div>
            <hr>
            <div class="network">
                <p>Profil sur les Réseaux</p>
                <br>
                <div class="plateforme">
                    <div class="inline"> <i class="fab fa-twitter"></i>
                        <div>
                            <p>Twitter</p>
                            <p>Réseau Social</p>
                        </div>
                    </div>

                    <i class="fa fa-pen"></i>
                </div>
                <br>
                <div class="plateforme">
                    <div class="inline">
                        <i class="fab fa-linkedin"></i>
                        <div>
                            <p>LinkedIn</p>
                            <p>Plateforme Social</p>
                        </div>
                    </div>
                    <i class="fa fa-pen"></i>
                </div>
            </div>
        </div>
        <div class="bodyContainer2">
            <div class="bodyContainer2a">
                <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="postStatus">
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="">
                        <input type="text" name="description" placeholder="Commentaire...">
                    </div>
                    {{-- Affichage de l'image selectionnée --}}
                    <div class="imageView" id="imageView">
                        <p id="imageContent" class="imageContent"></p>
                        <i onclick="deleteImage()" class="fa fa-trash">
                        </i>
                    </div>
                    <hr>
                    {{-- Les fichiers pouvant etre ajouté --}}
                    <div class="addfile">
                        <div>
                            <input onchange="imageFunction()" name="image" class="image" id="image"
                                type="file" accept="image/*">
                            <label for="image">
                                <i class="fa fa-image"></i>
                                <p>Image</p>
                            </label>

                        </div>
                        <div>
                            <i class="fa fa-video"></i>
                            <p>Video</p>
                        </div>
                        <div>
                            <i class="fa fa-file"></i>
                            <p>Fichier</p>
                        </div>
                        <div>
                            <i class="fa fa-microphone"></i>
                            <p>Audio</p>
                        </div>
                        <button type="submit">Poster</button>
                    </div>
                </form>

            </div>
            <br>
            @foreach ($posts as $post)
                <div class="posts">
                    <div class="bodyContainer2b">
                        <div class="postStatus">
                            <div class="nameAndLoca">
                                <img src="{{ asset('storage/' . $post->user->image) }}" alt="">
                                <div>
                                    <p>{{ $post->user->firstName }} {{ $post->user->lastName }}</p>
                                    <p>{{ $post->user->location }}</p>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('update_friend') }}">
                                @csrf
                                <input type="hidden" value="{{$post->user->id}}" name="friend_id" id="">
                                <button type="submit" class="form_button">
                                    <i class="fa fa-user-plus"></i>
                                </button>
                            </form>


                        </div>
                        <br>
                        <p>{{ $post->description }}</p>
                        <br>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="">
                        <br>
                        <div class="postFooter">
                            <div class="interaction">
                                <div>
                                    <i class="far fa-heart"></i>
                                    <p>4</p>
                                </div>
                                <div>
                                    <i class="far fa-comment"></i>
                                    <p>1</p>
                                </div>
                            </div>

                            <i class="fa fa-share"></i>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="bodyContainer3">
            <div class="bodyContainer3b">
                <div class="postStatus">
                    <i class="fa fa-rectangle-ad"></i>
                    <p>Sponsorisé</p>
                </div>
                <br>
                <br>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvz9ss2V1NKjTTSI5ip0t6GXKOep_FSbILmg&usqp=CAU"
                    alt="">
                <br>
                <div class="postFooter">
                    <div class="boutique">
                        <p>Mar Telecom</p>
                        <p>Produit informatique</p>
                    </div>
                    <br>
                    <p>Lorem quidem. Architecto quisquam recusandae expedita debitis enim cupiditate odit cumque dicta
                        corporis consectetur minima, illum fuga eos! Quis, repudiandae! Impedit
                    </p>
                </div>
            </div>
            <br>
            <br>
            <div class="bodyContainer3c">
                <p>Liste d'amis</p>
                <br>
                @foreach (User::find(auth()->user()->id)->friends as $friend)
                <div class="friends">
                    <div class="groupe">
                        <img src="{{ asset('storage/' . $friend->image) }}" alt="">
                        <div>
                            <p>{{$friend->firstName}} {{$friend->lastName}}</p>
                            <p>{{$friend->location}}</p>
                        </div>
                    </div>
                    <i class="fa fa-user-plus"></i>
                </div>
                @endforeach
               
            </div>
        </div>
    </main>
    <script>
        function logoutFunction() {
            var value = document.getElementById('option').value;
            if (value === 'logout') {
                document.getElementById('logout-form').submit();
            }
            console.log(value);
        }

        function imageFunction() {
            var image = document.getElementById('image');
            var imageView = document.getElementById('imageView');
            var imageContent = document.getElementById('imageContent');
            if (image.value) {
                imageView.style.display = 'flex';
                imageView.style.alignItems = 'center';
                imageView.style.justifyContent = 'space-between'
                imageContent.innerHTML = image.value;
            } else {
                imageView.style.display = 'none';
            }
        }

        function deleteImage() {
            var image = document.getElementById('image');
            image.value = null;
            imageFunction();
        }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
