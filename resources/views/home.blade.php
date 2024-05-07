@extends('layouts.landing')
@section('title', 'Gestion')

@section('content')

<div class="main_content">
    <div class="info">
        <div class="d-flex flex-column flex-lg-row inicio-management">
            <!-- Columna izquierda -->
            <div class="col-12 col-lg-8 mb-4 mb-lg-0" style="margin-right:30px; max-width:52vw">
                <div>
                    <div class="container" style="margin: 0px">
                        <div class="row align-items-center" style="margin: 0px">

                            <div class="col" style="margin: 0px; padding: 0px">
                                <h1>Mis eventos</h1>
                            </div>
                            <div class="col-auto" style="margin: 0px;">
                                <div class="arrow left-arrow"><img src="{{ asset('assests/img/management/arrow_left.png') }}"></div>
                            </div>
                            <div class="col-auto" style="margin: 0px;">
                                <div class="arrow right-arrow"><img src="{{ asset('assests/img/management/arrow_right.png') }}"></div>
                            </div>
                        </div>
                    </div>

                    <div class="shadow-container">
                        <div class="shadow-overlay"></div>
                        <div class="d-flex access">

                            <div class="card card-main-management">
                                <img src="{{ asset('assests/img/management/grados_icon.png') }}" class="img-fluid card-img-top" alt="Logo de la empresa 10Code" style="max-height: 24px; max-width:24px;">
                                <p>Creacion de Grados</p>
                            </div>

                            <div class="card card-main-management">
                                <img src="{{ asset('assests/img/management/calendar_icon.png') }}" class="img-fluid card-img-top" alt="Logo de la empresa 10Code" style="max-height: 24px; max-width:24px;">
                                <p>Calendario Anual</p>
                            </div>

                            <div class="card card-main-management">
                                <img src="{{ asset('assests/img/management/beca_icon.png') }}" class="img-fluid card-img-top" alt="Logo de la empresa 10Code" style="max-height: 24px; max-width:24px;">
                                <p>Matriculación</p>
                            </div>

                            <div class="card card-main-management">
                                <img src="{{ asset('assests/img/management/beca_icon.png') }}" class="img-fluid card-img-top" alt="Logo de la empresa 10Code" style="max-height: 24px; max-width:24px;">
                                <p>Becas</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div>
                    <div class="container match-body">
                        <div class="row align-items-center" style="margin: 0px">

                            <div class="col" style="margin: 0px; padding: 0px">
                                <h1>Mis eventos</h1>
                            </div>
                            <div class="col-auto" style="margin: 0px;">
                                <p class="detalles_titulo_events"><strong><a href="#">Ver todos</a></strong></p>
                            </div>

                        </div>

                        <div class="container match-body" style="margin: 0px">
                            <!-- Encabezado de la tabla -->
                            <div class="row d-flex justify-content-around align-items-center main-match-header p-2">
                                <div class="col">Equipo Local</div>
                                <div class="col">Resultado</div>
                                <div class="col">Equipo Visitante</div>
                                <div class="col">División</div>
                                <div class="col">MVP</div>
                            </div>

                            <!-- Primer partido -->
                            <div class="row d-flex justify-content-around align-items-center main-match-body">
                                <div class="col">CD. Sevilla</div>
                                <div class="col">65-48</div>
                                <div class="col">CD. Cartagena</div>
                                <div class="col">1º Regional</div>
                                <div class="col">Iván Guerra</div>
                            </div>

                            <!-- Segundo partido -->
                            <div class="row d-flex justify-content-around align-items-center main-match-body">
                                <div class="col">Maria Zambrano Azul</div>
                                <div class="col">75-60</div>
                                <div class="col">CD. Los Palacios</div>
                                <div class="col">2º Regional</div>
                                <div class="col">David López</div>
                            </div>

                            <!-- Tercer partido -->
                            <div class="row d-flex justify-content-around align-items-center main-match-body">
                                <div class="col">CD. Barcelona</div>
                                <div class="col">80-70</div>
                                <div class="col">CD. Madrid</div>
                                <div class="col">1º Nacional</div>
                                <div class="col">Javier Gómez</div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-12 col-lg-4" style="max-width:30vw">
                <h2>Calendario</h2>

                <div>
                    <div class="d-flex justify-content-between" style="margin: 0 10px 0 0;">
                        <h2>Próximos eventos</h2>
                        <p class="detalles_titulo_events"><strong><a href="#">Ver todos</a></strong></p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
