@extends('layouts.main')

@section('title')
    Início
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">
        <i class="fa fa-home px-1"></i>Início
    </li>
@endsection


@section('content')
        <div class="container-fluid p-0 p-2 pt-0">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-6 g-2">
                <div class="col">
                    <div class="card text-center text-bg-dark">
                        <a href="#" class="justify-content-center align-content-center text-decoration-none link-light">
                            <div class="card-body p-4">
                                <i class="fa-solid fa-person fs-1 pb-5"></i>
                                <p class="card-text">Pessoas</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center text-bg-dark">
                        <a href="{{route('rhMain')}}" class="justify-content-center align-content-center text-decoration-none link-light">
                            <div class="card-body p-4">
                                <i class="fa-solid fa-briefcase fs-1 pb-5"></i>
                                <p class="card-text">Recursos Humanos</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center text-bg-dark">
                        <a href="#" class="justify-content-center align-content-center text-decoration-none link-light">
                            <div class="card-body p-4">
                                <i class="fa-solid fa-paw fs-1 pb-5"></i>
                                <p class="card-text">Pet</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center text-bg-dark">
                        <a href="#" class="justify-content-center align-content-center text-decoration-none link-light">
                            <div class="card-body p-4">
                                <i class="fa-solid fa-cubes fs-1 pb-5"></i>
                                <p class="card-text">Material e Patrimônio</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center text-bg-dark">
                        <a href="#" class="justify-content-center align-content-center text-decoration-none link-light">
                            <div class="card-body p-4">
                                <i class="fa-solid fa-book fs-1 pb-5"></i>
                                <p class="card-text">Memorando</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center text-bg-dark">
                        <a href="#" class="justify-content-center align-content-center text-decoration-none link-light">
                            <div class="card-body p-4">
                                <i class="fa-solid fa-user-nurse fs-1 pb-5"></i>
                                <p class="card-text">Saúde</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center text-bg-dark">
                        <a href="#" class="justify-content-center align-content-center text-decoration-none link-light">
                            <div class="card-body p-4">
                                <i class="fa-solid fa-gears fs-1 pb-5"></i>
                                <p class="card-text">Configurações</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection
