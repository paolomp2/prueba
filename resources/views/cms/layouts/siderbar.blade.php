<div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src={!!asset("cms/images/entel.png")!!} alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido,</span>
              <h2>{{$gc->username}}</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <p>
            <div class="menu_section">
              <h3>&nbsp</h3>
              <h3>Opciones Generales</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-child"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/active_users/">Activos</a></li>
                    <li><a href="/inactive_users">Inactivos</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-child"></i> Preguntas <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/question">Preguntas</a></li>
                  </ul>
                </li> 
                <li><a><i class="fa fa-child"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/report_1">Reporte 1</a></li>
                    <li><a href="/report_2">Reporte 2</a></li>
                  </ul>
                </li>               
              </ul>
            </div>
            

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>