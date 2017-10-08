<nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="/plugins/images/pixeladmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="/plugins/images/pixeladmin-text.png" alt="home" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Buscar..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"> <img src="/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Usuario</b> </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 10px 0 0;">
                        <a href="#" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Tablero</span></a>
                    </li>
                    <li>
                        <a href="/user" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Usuarios</span></a>
                    </li>
                    <li>
                        <a href="/product" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Productos</span></a>
                    </li>
                    <li>
                        <a href="/purchase" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Compras</span></a>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Catalogos</span></a>
                        <ul class="dropdown">
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('brand.index') }}" class="waves-effect"> <span class= "hide-menu">Marcas</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('color.index') }}" class="waves-effect"> <span class="hide-menu">Colores</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('category.index') }}" class="waves-effect"> <span class="hide-menu">Categorías</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('supplier.index') }}" class="waves-effect"> <span class="hide-menu">Proveedores</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('magnitude.index') }}" class="waves-effect"> <span class="hide-menu">Magnitudes</span></a></li>
                            <li style="padding: 10px 0 0;"><a class="waves-effect" href="{{ route('metric.index') }}" class="waves-effect"> <span class="hide-menu">Medidas</span></a></li>
                        </ul>
                    </li>   
                </ul>
            </div>
        </div>