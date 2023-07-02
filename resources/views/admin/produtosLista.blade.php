<!doctype html>
<html lang="pt">

    <head>
        
        <meta charset="utf-8" />
        <title>Admin Zone | BetterWay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="icon" type="image/png" sizes="100x100" href="/resources/images/icon_logo-removebg-preview.png">

        <!-- jquery.vectormap css -->
        <link href="/resources/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="/resources/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="/resources/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href="/resources/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/resources/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/resources/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                          <a href="/" class="logo"><img src="/resources/images/logo.png" height="70px"></a>
                        </div>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="mb-3 m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-none d-sm-inline-block" >
                            
                            <button type="button" class="btn header-item waves-effect "
                            style="cursor: default">
                                <img class="" src="/resources/images/flags/portugal.png" style="cursor: default" alt="Header Language" height="20">
                            </button>
                            {{-- <div class="dropdown-menu dropdown-menu-end">
                    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="../resources/images/flags/us.jpg" alt="user-image" class="me-1" height="16"> <span class="align-middle">Inglês</span>
                                </a>

                            </div> --}}
                        </div>

                       

                        {{-- <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div> --}}

                       
                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="/resources/images/user-img/{{Auth::user()->avatar}}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{Auth::user()->name}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="/perfil"><i class="ri-user-line align-middle me-1"></i> Perfil</a>
                                 {{-- <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger"  href="{{ route('logout') }}"
                                
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                                  <i class="ri-shut-down-line align-middle me-1 text-danger"></i>
                                     {{ __('Logout') }}
                                     
                                </a>
                                
                                <form  id="logout-form"  action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>

            
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="/resources/images/user-img/{{Auth::user()->avatar}}" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">{{Auth::user()->name}}</h4>
                            {{-- <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span> --}}
                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="/admin/dashboard" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                      </svg>
                                    <span>Utilizadores</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/admin/users/lista">Lista</a></li>
                                </ul>
                            </li>
                
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z"/>
                                      </svg>
                                    <span>Categorias</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/admin/categorias/lista">Lista</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                                      </svg>
                                    <span>Produtos</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="/admin/produtos/lista">Lista</a></li>
                                            
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Lista de Produtos</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Produtos</a></li>
                                            <li class="breadcrumb-item active">Lista</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="page-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Produtos</h4>
                                                    @if (session('error'))
                                                            <div class="alert alert-danger">
                                                                {{ session('error') }}
                                                            </div
                                                    
                                                    @endif

                                                    @if(session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif
                                                    <form method="GET" action="{{ route('produtos_lista') }}">
                                                        <label for="sort">Ordenar por:</label>
                                                        <select id="sort" name="sort">
                                                            <option value="opcao_asc"{{ ($sort == 'opcao_asc') ? ' selected' : '' }}>Nome (A-Z)</option>
                                                            <option value="opcao_desc"{{ ($sort == 'opcao_desc') ? ' selected' : '' }}>Nome (Z-A)</option>
                                                        </select>
                                                        <button type="submit">Filtrar</button>
                                                    </form>
                                                <div class="table-responsive">
                                                    <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Utilizador</th>
                                                                <th>Nome</th>
                                                                <th>Preco</th>
                                                                <th>Categoria</th>
                                                                <th>Morada</th>
                                                                <th>Descrição</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($produtos as $produto)
                                                            <tr>
                                                                <td class="editable" contenteditable="false">{{ $produto->user->name }}</td>
                                                                <td class="editable" contenteditable="false">{{ $produto->nome }}</td>
                                                                <td class="editable" contenteditable="false">{{ $produto->preco }}</td>
                                                                <td class="editable" contenteditable="false">{{ $produto->categoria->categoria }}</td>
                                                                <td class="editable" contenteditable="false">{{ $produto->morada }}</td>
                                                                <td class="editable" contenteditable="false">{{ $produto->descricao }}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary btn-edit" data-id="{{ $produto->id }}">Editar</button><br><br>
                                                                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este produto?')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table> 
                                                </div>
                                                <br>
                                                {{ $produtos->links('vendor.pagination.custom') }}
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    
                </div>
                <!-- End Page-content -->
               
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © BetterWay.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Credits to Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script>
            // Seleciona todos os botões "Editar"
            const editButtons = document.querySelectorAll('.btn-edit');
        
            // Adiciona um evento de clique a cada botão "Editar"
            editButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Obtém o ID do usuário a partir do atributo "data-id" do botão
                    const produtosId = button.dataset.id;
        
                    // Redireciona o usuário para a página desejada com o ID do usuário
                    window.location.replace(`/admin/produtos/${produtosId}`);
                });
            });
        </script>
        <script src="/resources/libs/jquery/jquery.min.js"></script>
        <script src="/resources/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/resources/libs/metismenu/metisMenu.min.js"></script>
        <script src="/resources/libs/simplebar/simplebar.min.js"></script>
        <script src="/resources/libs/node-waves/waves.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}

        
        <!-- apexcharts -->
        <script src="/resources/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="/resources/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        
        <script src="/resources/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>
        
        <!-- Required datatable js -->
        <script src="/resources/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="/resources/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="/resources/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/resources/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script> --}}

       <script src="/resources/js/pages/dashboard.init.js"></script>

      

        <!-- App js -->
        {{-- <script src="../resources/js/app.js"></script> --}}
    </body>

</html>
