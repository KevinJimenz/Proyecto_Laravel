@extends('layouts.app')

@section('content')
<div class="container-fluid">




<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Aumento de prisioneros</h6>
            
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Delitos más cometidos</h6>
               
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Homicidio
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Robo
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Maltrato familiar
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Clasificación en la Cárcel <sup>2</sup></h6>
    </div>
    <div class="card-body">
        <!-- Nivel de Seguridad -->

        <div class="accordion" id="securityLevelAccordion">
            <div class="card">
                <div class="card-header" id="headingMaxSecurity">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseMaxSecurity" aria-expanded="true" aria-controls="collapseMaxSecurity">
                            Nivel de Seguridad <span class="float-right">80%</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseMaxSecurity" class="collapse show" aria-labelledby="headingMaxSecurity" data-parent="#securityLevelAccordion">
                    <div class="card-body">
                        <div class="progress mb-4">
                          
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Media seguridad<span class="float-right">50%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Minima seguridad<span class="float-right">30%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
    <div class="card-header" id="headingMediumSecurity">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseMediumSecurity" aria-expanded="false" aria-controls="collapseMediumSecurity">
                Tipo de recluso <span class="float-right">60%</span>
            </button>
        </h2>
    </div>
    <div id="collapseMediumSecurity" class="collapse" aria-labelledby="headingMediumSecurity" data-parent="#securityLevelAccordion">
        <div class="card-body">
            <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h4 class="small font-weight-bold">Preventivo<span class="float-right">70%</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h4 class="small font-weight-bold">Condenados<span class="float-right">40%</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header" id="headingDelito">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseDelito" aria-expanded="false" aria-controls="collapseDelito">
                Naturaleza del Delito <span class="float-right">70%</span>
            </button>
        </h2>
    </div>
    <div id="collapseDelito" class="collapse" aria-labelledby="headingDelito" data-parent="#securityLevelAccordion">
        <div class="card-body">
            <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h4 class="small font-weight-bold">Delitos Violentos<span class="float-right">70%</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h4 class="small font-weight-bold">Delitos No Violentos<span class="float-right">40%</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>

     
    </div>
</div>


    </div>


</div>

</div>
@endsection
