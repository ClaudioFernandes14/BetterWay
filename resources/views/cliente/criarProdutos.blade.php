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
    <link href="../resources/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../resources/css/produtos/criarProdutos.css">
   

    <link rel="icon" type="image/png" sizes="100x100" href="../resources/images/icon_logo-removebg-preview.png">



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>

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
        <a href="#categories">Categorias</a>
        <a href="/produtos/criar">Adicionar Produtos</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn" ></div>
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
               
                <a href="/perfil" class="links"><i class="fas fa-arrow-right"></i> Perfil</a>
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

    <form action="" class="search-form" autocomplete="off">
        <input type="search" id="search-box" placeholder="pesquisar">
        <label for="search-box" class="fas fa-search"></label>
    </form>
</header>

<!-- header section ends -->

<!-- features section starts  -->
<h1 class="heading"><span>Adicionar Produtos</span></h1>
<section class="criarProdutos" id="idCriarProdutos">
    <form method="POST" autocomplete="off"  action="{{ route('produtos.mostrar') }}" enctype="multipart/form-data">
        @csrf
        @if(session('error'))
            <div class="{{ session('class') }}">{{ session('error') }}</div>
        @endif
        <div class="form-group">
          <label for="imagem">Imagens *:   </label>
          <div class="imagem-slide">
            <div class="imagem-box" id="img1"></div>
            <div class="imagem-box" id="img2"></div>
            <div class="imagem-box" id="img3"></div>
            <div class="imagem-box" id="img4"></div>
            <div class="imagem-box" id="img5"></div>
          </div>

          <input type="file" id="imagem" name="url[]" onchange="adicionarImagem()" multiple> 
        
          
          <div class="imagem-preview"></div> <!-- Adiciona a div de preview de imagem -->
        </div>
        <div class="form-group">
            <label for="nome">Nome *:</label>
            <input type="text" id="nome" name="nome" autocomplete="on">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição *:</label>
            <textarea id="descricao" name="descricao" ></textarea>
        </div>
        <div class="form-group">
            <label for="preco">Preço *:</label>
            <input type="number" id="preco" name="preco" step="0.01" min="0">
        </div>
        <div class="form-group">
            <label for="morada">Morada *:</label>
            <input type="text" id="morada" name="morada">
        </div>
        <div class="form-group">
            <label for="categorias">Categorias *:</label>
            <select id="categorias" name="categorias" class="categorias-select">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" class="categorias-option">{{ $categoria->categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="popup" id="confirm-popup">
            <div class="popup-content">
            <h2>Confirma password para por o seu produto à venda</h2>
            <br>

            <label for="passwordEditar"><h2>Password:</h2></label>
                <input type="password" id="passwordEditar" name="password" required>
                <div class="buttons">
                <button type="submit" class="confirm-btn">Confirmar</button>
                <button type="button" class="cancel-btn" onclick="closePopup()">Cancelar</button>
                </div>
            
            </div>
        </div>

        <div class="Editar">
            <button type="button" class="edit-btn" onclick="openPopup()">Confirmar Produto</button>
        </div>
    </form>
  </section>


    


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
            <a href="/categorias" class="links"> <i class="fas fa-arrow-right"></i> Categorias </a>
            <a href="/produtos/criar" class="links"> <i class="fas fa-arrow-right"></i> Adicionar Produtos </a>
            <a href="/perfil" class="links"> <i class="fas fa-arrow-right"></i> Perfil </a>
        </div>

    </div>

</section>

<!-- footer section ends -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../resources/js/script.js"></script>
<script src="../resources/js/perfil.js"></script>
<script src="../resources/js/produtos/criarProdutos.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>