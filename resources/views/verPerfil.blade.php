<!DOCTYPE html>

<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BetterWay</title> 

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
    <!-- Icons Css -->
    <link href="/resources/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="/resources/css/verPerfil.css">
   

    <link rel="icon" type="image/png" sizes="100x100" href="/resources/images/icon_logo-removebg-preview.png">



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>

</head>
<body>
   
<!-- header section starts  -->

<header class="header">

    <a href="/" class="logo"><img src="/resources/images/logo.png" height="90px"></a>

    <nav class="navbar">
        <a href="/favoritos">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
              </svg> 
              ‎ Favoritos
        </a>
        <a href="7index">Categorias</a>
        <a href="/produtos/criar">Adicionar Produto</a>
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
        <div class="avatar" id="cart-btn"><a href="/perfil"><img id="imagemUt" src="/resources/images/user-img/{{Auth::user()->avatar}}"></a></div>
        <li class="nav-link dropdown">

            <a id="navbarDropdown" class="nav-link dropdown-toggle" onclick="myFunction()" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name}}
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </a>

            <div id="myDropdown" class="dropdown-content" aria-labelledby="navbarDropdown">
               
                <a href="/perfil" class="links"><i class="fas fa-arrow-right"></i> Perfil</a>
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

<!-- features section starts  -->
<h1 class="heading"><span><h3>Perfil</h3></span></h1>
<section id="mostrarProdutos" class="criarProdutos">
    <form action="verProdutos">

        <div class="form-group">
            
            <div class="avatarVer" id="cart-btn">
                <h1>Utilizador</h1> 
                <img id="imagemUt" src="/resources/images/user-img/{{ $user->avatar }}">
                <h1 class="nameVendor">{{ $user->name }} <i class="fa fa-envelope" aria-hidden="true" data-email="{{ $user->email }}" data-phone="{{ is_numeric($user->telemovel) ? (strval($user->telemovel) >= 9 ? $user->telemovel : 'Sem telemovel definido') : '' }}"></i></h1>
            </div>


            <br>
            <br>
            <br>
            <br>
            <div class="detalhes-produto">
                <h1>Morada</h1>
                <h3>{{ str_repeat('*', strlen($user->morada)) }}</h3>
                
            </div>

            
            <div class="detalhes-produto">
                <h1>Codigo Postal</h1>
                <h3>{{ str_repeat('*', strlen($user->cod_postal)) }}</h3>
            </div>

            <div class="detalhes-produto">
                <h1>NIF</h1>
                <?php if ($user->nif == 1): ?>
                    <h3>*********</h3>
                <?php else: ?>
                    <h3><?php echo $user->nif; ?></h3>
                    <h3>{{ str_repeat('*', strlen($user->nif)) }}</h3>
                <?php endif; ?>
            </div>
            
        </div>
    </form>
</section>


<h1 class="heading"><span>Produtos do Utilizador</span></h1>

<form action="meusProdutos">
    <section class="features" id="features">
        <div class="box-container">
            @foreach ($produtos as $produto)
                <div class="box">
                    @if ($imagens->where('id_produto', $produto->id)->count() > 0)
                        <div class="imagem">
                            <img src="../resources/images/produtos/{{ $imagens->where('id_produto', $produto->id)->first()->url }}" alt="">
                        </div>
                    @endif
                    <h3>{{ $produto->nome }}</h3>
                    <div class="price">{{ $produto->preco }} €</div>
                    <a href="/produtos/ver/{{$produto->id}}" class="btn">Ver Produto</a><br>    
                </div>
            @endforeach
        </div>
    </section>
</form>


<!-- features section ends -->


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
            <a href="/produtos/criar" class="links"> <i class="fas fa-arrow-right"></i> Adicionar Produto </a>
            <a href="/perfil" class="links"> <i class="fas fa-arrow-right"></i> Perfil </a>
        </div>

    </div>

</section>

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

<!-- footer section ends -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="/resources/js/script.js"></script>
<script src="/resources/js/perfil.js"></script>
<script src="/resources/js/produtos/mostrarProdutos.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




</body>
</html>