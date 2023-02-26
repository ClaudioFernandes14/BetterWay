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

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../resources/css/style-perfil.css">
   

    <link rel="icon" type="image/png" sizes="100x100" href="resources/images/icon_logo-removebg-preview.png">

</head>
<body>
   
<!-- header section starts  -->

<header class="header">

    <a href="/" class="logo"><img src="../resources/images/logo.png" height="90px"></a>

    <nav class="navbar">
        <a href="#features">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots" viewBox="0 0 16 16">
                <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
            ‎ Mensagens
        </a>
        <a href="/favoritos">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
              </svg> 
              ‎ Favoritos
        </a>
        <a href="#categories">categories</a>
        <a href="#review">review</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn" ></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
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
        <div class="avatar" id="cart-btn"><a href="/perfil"><img id="imagemUt" src="../resources/images/{{Auth::user()->avatar}}"></a></div>
        <li class="nav-link dropdown">

            <a id="navbarDropdown" class="nav-link dropdown-toggle" onclick="myFunction()" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name}}
            </a>

            <div id="myDropdown" class="dropdown-content" aria-labelledby="navbarDropdown">
                <a href="/perfil" class="links"><i class="fas fa-arrow-right"></i> Perfil</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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

<!-- home section starts  -->

<section class="home" id="home">
    <div class="content">
        <img src="../resources/images/{{$user->avatar}}" style="height:150px; width:150px; float:left; border-radius:50%; margin-right:25px">
        <h3>Bem vindo ao seu perfil <span>{{$user->name}} </span></h3>
        <p>Aqui podera mudar as suas<span class="spans"> informacoes pessoais</span></p>
    </div>
</section>


<section class="perfil" id="perfil">
    <div class="box-container">
        <div class="box-img">
            <form enctype="multipart/form-data" autocomplete="off" action="/perfil/avatar" method="POST" >
                <h2>Inserir Imagem</h2>
                <input type="file" name="avatar" style="cursor: pointer; padding:2rem">
                <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                <br>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" autocomplete="off" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</section>


<!-- home section ends -->


<!-- features section starts  -->

<form action="/perfil/editar" method="POST">
    @csrf
    <div class="card border border-primary shadow-0 ">
        <h1 class="heading"><span>Informacoes Pessoais</span></h1>
        <table class="tabelaInf">
            <tr class="tr1">
                <td class="td1">
                    <div class="card-body">
                        <h1 class="card-title">Nome *</h5>
                  
                        <input class="card-text" type="text" name="name" autocomplete="off" placeholder="{{Auth::user()->name}}" size="20" required>
                  
                    </div>
                </td>
    
                <td class="td1">
                    <div class="card-body">
                        <h1 class="card-title">Email *</h5> 
                  
                        <input class="card-text" type="text" name="email" placeholder="{{Auth::user()->email}}" autocomplete="off" size="30" required>
                  
                    </div>
                </td>
    
                <td class="td1">
                    <div class="card-body">
                        <h1 class="card-title">Telemovel *</h5> 
                  
                        <input class="card-text" type="text" name="telemovel" size="20" required>
                  
                    </div>
                </td>
    
            </tr>
    
            <tr class="tr1">
                <td class="td1">
                    <div class="card-body">
                        <h1 class="card-title">Password *</h5> 
                  
                        <input class="card-text" type="password" name="password" size="20" required>
                  
                    </div>
                </td>   
    
                <td class="td1">
                    <div class="card-body">
                        <h1 class="card-title">Morada *</h5> 
                  
                        <input class="card-text" type="text" name="morada" size="20" required>
                    </div>
                </td> 

                <td class="td1">
                    <div class="card-body">
                        <h1 for="cod_postal" class="card-title">Codigo Postal *</h5> 
                  
                        <input class="card-text" autocomplete="off" type="text" name="cod_postal" size="20" required>
                    </div>
                </td> 
                
                <td class="td1">
                    <div class="card-body">
                        <h1 class="card-title">Nif *</h5> 
                  
                        <input class="card-text" type="text" name="nif" size="20" required>
                  
                    </div>
                </td>
            </tr>
        </table>
    </div>
    
    <div class="field btn-Inf">
        <div class="btn-layer-Inf"></div>
        <input type="submit" value="Atualizar">
    </div>
</form> 



<!-- features section ends -->

<!-- products section starts  -->

<section class="features" id="features">
    <h1 class="heading"><span>produtos</span></h1>
    <div class="box-container">
        
        <div class="box">
            <img src="image/product-1.png" alt="">
            <h3>fresh orange</h3>
            <div class="price"> $4.99/- - 10.99/- </div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="#" class="btn">ver produto</a>
        </div>

        <div class="box">
            <img src="image/product-3.png" alt="">
            <h3>fresh meat</h3>
            <div class="price"> $4.99/- - 10.99/- </div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="#" class="btn">ver produto</a>
        </div>

        <div class="box">
            <img src="image/product-4.png" alt="">
            <h3>fresh cabbage</h3>
            <div class="price"> $4.99/- - 10.99/- </div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="#" class="btn">ver produto</a>
        </div>
   
        <div class="box">
            <img src="image/product-5.png" alt="">
            <h3>fresh potato</h3>
            <div class="price"> $4.99/- - 10.99/- </div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="#" class="btn">ver produto</a>
        </div>

        <div class="box">
            <img src="image/product-6.png" alt="">
            <h3>fresh avocado</h3>
            <div class="price"> $4.99/- - 10.99/- </div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="#" class="btn">ver produto</a>
        </div>

        <div class="box">
            <img src="image/product-7.png" alt="">
            <h3>fresh carrot</h3>
            <div class="price"> $4.99/- - 10.99/- </div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="#" class="btn">ver produto</a>
        </div>

        
        <div class="box">
            <img src="resources/images/logo.png" alt="">
            <h3>green lemon</h3>
            <div class="price">10€</div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="#" class="btn">ver produto</a>
        </div>

        <div class="box">
            <img src="resources/images/logo.png" alt="">
            <h3>green lemon</h3>
            <div class="price">10€</div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="#" class="btn">ver produto</a>
        </div>

        <div class="box">
            <img src="image/product-7.png" alt="">
            <h3>fresh carrot</h3>
            <div class="price"> $4.99/- - 10.99/- </div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="#" class="btn">ver produto</a>
        </div>

    </div>
</section>

<!-- products section ends -->

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
            <a href="/mensagens" class="links"> <i class="fas fa-arrow-right"></i> Mensagens </a>
            <a href="/favoritos" class="links"> <i class="fas fa-arrow-right"></i> Favoritos </a>
            <a href="/categorias" class="links"> <i class="fas fa-arrow-right"></i> Categorias </a>
            <a href="/perfil" class="links"> <i class="fas fa-arrow-right"></i> Perfil </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> blogs </a>
        </div>

    </div>

</section>

<!-- footer section ends -->

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../resources/js/script.js"></script>

</body>
</html>