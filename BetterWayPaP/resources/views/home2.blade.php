<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>BetterWay</title>
    <link rel="stylesheet" href="../resources/css/style.css">
</head>

<link rel="icon" type="image/png" sizes="50x50" href="resources/images/icon_logo-removebg-preview.png">

<body>
    <section id="header">
        <div class="logo_header">
            <input type="checkbox" id="chec">
            
            <label for="chec">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </label>
            <nav id="nav">

             

                <ul>
                    <li><a href="favoritos">Favoritos</a></li>
                    <li><a href="mensagens">Mensagens</a></li>
                    <li>
                      

       
                    <a href="/login">Perfil</a></li>
                    <li><a href="">Opcoes</a></li>
                    <li class="nav-item dropdown">

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <a href="index.html"><img src="../resources/images/logo.png" class="logo"></a>
        </div>

        <div class="navigation_header" id="navigation_header">
            <ul id="navbar">
                <li><a href="favoritos" title="Favoritos" class="active"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg></a>
                </li>
                <li><a href="mensagens" title="Mensagens" class="active"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-right-fill" viewBox="0 0 16 16">
                    <path d="M14 0a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                  </svg> ‎ ‎ Mensagens</a>
                </li>
                <li>
                   
                    <a href="perfil" class="active" title="Perfil"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg></a>
                </li>
                <button class="btn third">Vender</button>
            </ul>
        </div>
    </section>

    <section id="feature">
        <div class="fe-box">
            
        </div>
    </section>

    <script src="../resources/js/app.js"></script>
</body>

</html>
