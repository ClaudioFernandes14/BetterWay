<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BetterWay</title> 

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Icons Css -->
    <link href="../resources/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../resources/css/favoritos.css">

    <link rel="icon" type="image/png" sizes="100x100" href="resources/images/icon_logo-removebg-preview.png">

</head>
<body>
    
    
<!-- header section starts  -->

<header class="header">

    <a href="/" class="logo"><img src="../resources/images/logo.png" height="90px"></a>

    <nav class="navbar">
        <a href="/favoritos">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
              </svg> 
              ‎ Favoritos
        </a>
        <a href="/index">Categorias</a>
        <a href="/produtos/criar">Adicionar Produtos</a>
    </nav>

    <div class="icons">
        
        <div class="fas fa-search" id="search-btn"></div>
    </div>

    <div class="dropdown">
        <!-- Authentication Links -->
        
        @guest
        <div class="testeLogin">
            @if (Route::has('login'))
            <li class="title login">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif
        </div>

        <div class="teste-register">
            @if (Route::has('register'))
            <li class="title signu">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registar') }}</a>
            </li>
            @endif
        </div>
        
        @else
        
        <div class="avatar" id="cart-btn"><a href="/perfil"><img id="imagemUt" src="../resources/images/user-img/{{Auth::user()->avatar}}"></a></div>
       
       
        <li class="nav-link dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" onclick="myFunction()" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name}}
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </a>

            <div id="myDropdown" class="dropdown-content" aria-labelledby="navbarDropdown">
                <a href="/perfil" class="links"> <i class="fas fa-arrow-right"></i> Perfil</a>
                <?php 
                    if (Auth::user()->idCargo == 1) {
                        echo '<a href="/admin/dashboard" class="links"><i class="fas fa-arrow-right"></i> Admin Zone</a>';
                    }
                ?> 
                <a class="dropdown-item text-danger" style="color:red"  href="{{ route('logout') }}"
                                
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="ri-shut-down-line align-middle me-1 text-danger" style="color: red"></i>
                    {{ __('Logout') }}
             
                </a>
        
                <form  id="logout-form"  action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </div>

    <form action="{{ route('search') }}" class="search-form" method="GET">
        <input type="search" id="search-box" name="searchTerm" placeholder="pesquisar">
        <button type="submit" id="search-button"><i class="fas fa-search"></i></button>
    </form>
</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">
    <h1 class="heading"><span>Favoritos</span> </h1>
</section>

<!-- home section ends -->
    <section class="features" id="features">
        <div class="box-container">
            @foreach ($produtos as $produto)
                <div class="box">
                    @if ($imagens->where('id_produto', $produto->id)->count() > 0)
                        <div class="imagem">
                            <img src="resources/images/produtos/{{ $imagens->where('id_produto', $produto->id)->first()->url }}" alt="">
                        </div>
                    @endif
                    <h3>{{ $produto->nome }}</h3>
                    <div class="price">{{ $produto->preco }} €</div>
                    <a href="/produtos/ver/{{$produto->id}}" class="btn">Ver Produto</a><br>    
                    <form action="/favoritos/remover/{{$produto->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn">Remover dos Favoritos</button>
                    </form> 
                </div>
            @endforeach
        </div>
    </section>
    




<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">
        <div class="box">
            <h3>Redes Sociais</h3>
            <p>Estas são as minhas redes sociais, para quem quiser explorar mais sobre mim</p>
            <div class="share">
                <a href="https://www.linkedin.com/in/claudio-fernandes-917a92230" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <h3>Contactos</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +351924348452 </a>
            <a href="https://www.gmail.com" class="links"> <i class="fas fa-envelope"></i> claudio.fernandes.silva2017@gmail.com </a>
            <a href="https://earth.google.com/web/search/Sintra/@38.78851854,-9.39697535,397.38031069a,14504.91868478d,35y,0h,0t,0r/data=CnAaRhJACiQweGQxZWRhYzFhNzUxMGVlOToweDEzNTg1Y2MwYjAwZjU3M2MZs73MZsRmQ0AhZXSby2jDIsAqBlNpbnRyYRgCIAEiJgokCXaHpSwqYDRAEXeHpSwqYDTAGeuvL2uu9UJAIeiq5ZfnAlDA" class="links"> <i class="fas fa-map-marker-alt"></i> Sintra, Portugal</a>
        </div>

        <div class="box">
            <h3>Links Rapidos</h3>
            <a href="/favoritos" class="links"> <i class="fas fa-arrow-right"></i> Favoritos </a>
            <a href="/index" class="links"> <i class="fas fa-arrow-right"></i> Categorias </a>
            <a href="/produtos/criar" class="links"> <i class="fas fa-arrow-right"></i> Adicionar Produtos </a>
            <a href="/perfil" class="links"> <i class="fas fa-arrow-right"></i> Perfil </a>
        </div>

    </div>
    

</section>


<!-- footer section ends -->
<script>
    const searchBox = document.getElementById('search-box');
    const productList = document.getElementById('product-list');
    const searchButton = document.getElementById('search-button');
  
    const searchForm = document.querySelector('search-form');
  
    searchForm.addEventListener('submit', (event) => {
      event.preventDefault();
    });
  
    const searchButton = document.getElementById('search-button');
  
      searchButton.addEventListener('click', (event) => {
      event.preventDefault();
      const searchValue = searchBox.value.toLowerCase();
  
      // Envia uma solicitação AJAX para buscar os resultados da pesquisa
      fetch(`{{ route('search') }}?searchTerm=${searchValue}`)
          .then(response => response.text())
          .then(data => {
          productList.innerHTML = data;
          });
  });
  </script>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../resources/js/script.js"></script>

</body>
</html>