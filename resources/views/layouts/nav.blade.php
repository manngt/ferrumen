<nav style="max-height: auto; overflow-x: auto;" class="navbar navbar-default navbar-static-top m-b-0">
            <div style="background-color: #353232" class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
                <div class="top-left-part"><a class="logo" href="/"><b><img class ="visible-lg" style="width: 200px; height: auto" src="/images/ferrumenlogo.jpeg" alt="home" /></b><span class="hidden-xs"></span></a></div>
                <ul style="background-color: #353232" class="nav navbar-top-links navbar-right pull-right">

                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <strong>Salir</strong>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div style="background-color: #74777b" class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 10px 0 0;">
                        <a href="/" class="waves-effect"><i class="fa fa-line-chart fa-fw" aria-hidden="true"></i><span class="hide-menu">Tablero</span></a>
                    </li>
                    <li style="padding: 10px 0 0;">
                        <a href="/report" class="waves-effect"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i><span class="hide-menu">Reportes</span></a>
                    </li>
                    <li>
                        <a href="/product" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Productos</span></a>
                    </li>
                    <li>
                        <a href="/purchase" class="waves-effect"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i><span class="hide-menu">Compras</span></a>
                    </li>
                    <li>
                        <a href="/customer" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Clientes</span></a>
                    </li>
                    <li>
                        <a href="/sale" class="waves-effect"><i class="fa fa-money fa-fw" aria-hidden="true"></i><span class="hide-menu">Ventas</span></a>
                    </li>
                    <li>
                        <a href="/user" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i><span class="hide-menu">Usuarios</span></a>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Catalogos</span></a>
                        <ul class="dropdown">
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('brand.index') }}" class="waves-effect"> <span class= "hide-menu">Marcas</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('color.index') }}" class="waves-effect"> <span class="hide-menu">Colores</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('magnitude.index') }}" class="waves-effect"> <span class="hide-menu">Medidas</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('metric.index') }}" class="waves-effect"> <span class="hide-menu">Unidades de medida</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('category.index') }}" class="waves-effect"> <span class="hide-menu">Categorías</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('supplier.index') }}" class="waves-effect"> <span class="hide-menu">Proveedores</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('purchasestatus.index') }}" class="waves-effect"> <span class="hide-menu">Estados de compra</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('paymentmethod.index') }}" class="waves-effect"> <span class="hide-menu">Metodos de pago</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('salestatus.index') }}" class="waves-effect"> <span class="hide-menu">Estados de venta</span></a></li>
                        </ul>
                    </li>   
                </ul>
            </div>
        </div>