<nav id="buscador" class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid" style="padding-right:0px">
        <img src="{{ asset('assests/img/logo_mz_rosa.png') }}" alt="s" width="156" height="58" style="margin-top: 10px">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="mx-auto">
                <ul class="navbar-nav ">
                    <div class="input-group input-group-sm m-2 ">
                        <span class="input-group-text" id="inputGroup-sizing-sm"> <img src="{{ asset('assests/img/lupa_icon.png') }}"
                                alt="icono de una lupa" width="15" height="15"></span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                            placeholder="Buscar" style="width: 21vw;">
                    </div>
                </ul>
            </div>

            <ul id="buscador-menu" class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{ asset('assests/img/message_icon.png') }}" alt="icono mensajeria"
                            width="32" height="32"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{ asset('assests/img/notificication_icon.png') }}"
                            alt="icono perfil" width="32" height="32"></a>
                </li>
                <li class="nav-item">
                    <a id="acceso_personalizado" class="nav-link" href="#"> <img src="{{ asset('assests/img/perfil_icon.png') }}"
                            alt="icono perfil" width="12" height="15"> Acceso personalizado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ES | EN</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>

  <div class="wrapper">
      <div class="sidebar d-flex flex-column justify-content-between" style="height: 95%;">

              <ul style="margin-bottom: 0px; padding-top: 10px;">
                  <li><a href="#"><img src="{{ asset('assests/img/management/inicio_icon.png') }}" alt="icono mensajeria" width="27" height="27" style="margin-right: 10px;">INICIO</a></li>
                  <li><a href="#"><img src="{{ asset('assests/img/management/cat_icon.png') }}" alt="icono categoria" width="27" height="27" style="margin-right: 10px;">CATEGORÍAS</a></li>
                  <li><a href="#"><img src="{{ asset('assests/img/management/asig_icon.png') }}" alt="icono asignatura" width="27" height="27" style="margin-right: 10px;">ASIGNATURAS</a></li>
                  <li><a href="#"><img src="{{ asset('assests/img/management/prof_icon.png') }}" alt="icono profesorado" width="27" height="27" style="margin-right: 10px;">PROFESORADO</a></li>
                  <li><a href="#"><img src="{{ asset('assests/img/management/alumn_icon.png') }}" alt="icono alumnado" width="27" height="27" style="margin-right: 10px;">ALUMNADO</a></li>
                  <li><a href="#"><img src="{{ asset('assests/img/management/mat_icon.png') }}" alt="icono matricula" width="27" height="27" style="margin-right: 10px;">MATRÍCULAS</a></li>
                  <li><a href="#"><img src="{{ asset('assests/img/management/event_icon.png') }}" alt="icono events" width="27" height="27" style="margin-right: 10px;">EVENTOS</a></li>
                  <li><a href="#"><img src="{{ asset('assests/img/management/not_icon.png') }}" alt="icono noticias" width="27" height="27" style="margin-right: 10px;">NOTICIAS</a></li>
                  <li><a href="#"><img src="{{ asset('assests/img/management/espac_icon.png') }}" alt="icono espacios" width="27" height="27" style="margin-right: 10px;">ESPACIOS</a></li>
                  <li><a href="#"><img src="{{ asset('assests/img/management/pago_icon.png') }}" alt="icono pagos" width="27" height="27" style="margin-right: 10px;">PAGOS</a></li>
                  <li><a href="#"><img src="{{ asset('assests/img/management/rol_icon.png') }}" alt="icono roles" width="27" height="27" style="margin-right: 10px;">ROLES</a></li>
              </ul>
              <ul>
                  <li><a href="#"><img src="{{ asset('assests/img/management/confi_icon.png') }}" alt="icono mensajeria" width="27" height="27" style="margin-right: 10px;">CONFIGURACIÓN</a></li>
              </ul>
          </div>
