@extends('layouts.main')

@section('title')
{{ env('APP_NAME') }} - Cadastro de Funcionário
@endsection

@section('operation-title')
Cadastron
@endsection


@section('breadcrumbs')
<li class="breadcrumb-item" aria-current="page">
    <a href="/">
        <i class="fa fa-home"></i>Home
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="/people">
        <i class="far fa-address-book"></i>Pessoa
    </a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="/people/employees/adm">
        <i class="far fa-address-book"></i>Funcionários
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <i class="far fa-address-book"></i>Cadastrar
</li>
@endsection


@section('content')
<div class="content-body">
    <section class="panel" >
    
    <!-- 
        accessing the form for the first time, there is no verification variable. Then, show cpf form.
    -->
    @if(!isset($cpfAlreadyExists))
        <header class="panel-heading">
            <h2 class="panel-title">Digite seu CPF</h2>
        </header>
        <div class="panel-body">
            
            <form method="GET" action="/people/employees/checkCPF">
                <input type="text" class="form-control" id="cpf" name="cpf" 
                placeholder="Ex: 222.222.222-22" maxlength="14"
                onblur="validarCPF(this.value)" onkeypress="return Onlynumbers(event)" 
                onkeyup="mascara('###.###.###-##',this,event)" required>
                
                <p id="cpfInvalido" style="display: none; color: #b30000">CPF INVÁLIDO!</p>
                
                <button class='mb-xs mt-xs mr-xs btn btn-primary'>Enviar</button>
            </form>
            <!--if(!session('cpfAlreadyExists') && session('cpfChecked'))-->
        </div>
    <!-- 
        If there is cpfAlreadyExist variable, it means that we check in the database if cpf number is saved
    -->
    @else
        <!-- 
            Two possibilities:
            - CPF is saved in the database, so it is not possible save a person with this data
        -->
        @if($cpfAlreadyExists)
        <div class="alert alert-danger" role="alert">
            Erro. Funcionário já cadastrado no sistema. 
        </div>
        <header class="panel-heading">
            <h2 class="panel-title">Digite seu CPF</h2>
        </header>
        <div class="panel-body">
            
            <form method="GET" action="/people/employees/checkCPF">
                <input type="text" class="form-control" id="cpf" name="cpf" 
                placeholder="Ex: 222.222.222-22" maxlength="14"
                onblur="validarCPF(this.value)" onkeypress="return Onlynumbers(event)" 
                onkeyup="mascara('###.###.###-##',this,event)" required>
                
                <p id="cpfInvalido" style="display: none; color: #b30000">CPF INVÁLIDO!</p>
                
                <button class='mb-xs mt-xs mr-xs btn btn-primary'>Enviar</button>
            </form>
            <!--if(!session('cpfAlreadyExists') && session('cpfChecked'))-->
        </div>

        <!-- 
            Two possibilities:
            - CPF is not saved in the database, so it could save a person with this data
        -->
        @else

        <div class="row" id="formulario">
            <form action="#" method="POST" id="formsubmit" enctype="multipart/form-data" target="frame">
                <div class="col-md-4 col-lg-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="thumb-info mb-md">
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    if (isset($_FILES['person.photo'])) {
                                        $image = file_get_contents($_FILES['person.photo']['tmp_name']);
                                        $_SESSION['person.photo'] = $image;
                                        echo '<img src="data:image/gif;base64,' . base64_encode($image) . '" class="rounded img-responsive" alt="Profile photo">';
                                    }
                                }
                            ?>
                                <input type="file" class="image_input form-control" onclick="okDisplay()" name="person.photo"  id="imgform">
                                <div id="display_image" class="thumb-info mb-md"></div>
                                <div id="botima">
                                    <h5 id="okText"></h5>
                                    <input type="submit" class="btn btn-primary stylebutton" 
                                        onclick="submitButtonStyle(this)" id="okButton" value="Ok"> 
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
            <div class="col-md-8 col-lg-8">
                <div class="tabs">
                    <ul class="nav nav-tabs tabs-primary">
                        <li class="active">
                            <a href="#overview" data-toggle="tab">Cadastro de Funcionário</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane active">
                            <form method="POST" action="/people/employees" class="form-horizontal" >
                                @csrf

                                <input type="hidden" name="personDoc.cpf" value="{{$cpf}}">
                            
                                <h4 class="mb-xlg">Informações Pessoais</h4>
                                <h5 class="obrig">Campos Obrigatórios(*)</h5>
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">
                                        Nome<sup class="obrig">*</sup>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" 
                                                id="name" name="person.name" 
                                                onkeypress="return Onlychars(event)" required>
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="gender">
                                        Gênero<sup class="obrig">*</sup>
                                    </label>
                                    <div class="col-md-8">
                                    <label>
                                        <input type="radio" 
                                                id="gender" name="person.gender"
                                                value="m" 
                                                style="margin-top: 10px; margin-left: 15px;" 
                                                onclick="return exibir_reservista()" required>
                                        <i class="fa fa-male" style="font-size: 20px;"></i>
                                    </label>
                                    <label>
                                        <input type="radio" 
                                                id="genderF" name="person.gender"
                                                value="f" 
                                                style="margin-top: 10px; margin-left: 15px;" 
                                                onclick="return esconder_reservista()">
                                        <i class="fa fa-female" style="font-size: 20px;"></i> 
                                    </label>
                                </div>
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="phone">
                                        Telefone<sup class="obrig">*</sup>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" 
                                                id="phone" name="person.phone"
                                                maxlength="14" minlength="14" 
                                                placeholder="Ex: (22)99999-9999" 
                                                onkeypress="return Onlynumbers(event)" 
                                                onkeyup="mascara('(##)#####-####',this,event)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="birthday">
                                        Nascimento<sup class="obrig">*</sup>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control"
                                                id="birthday" name="person.birthday"
                                                maxlength="10" 
                                                placeholder="dd/mm/aaaa" required>
                                    </div>
                                </div>
                                
                                <hr class="dotted short">
                                
                                <h4 class="mb-xlg doch4">Documentação</h4>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="rg">
                                        Número do RG<sup class="obrig">*</sup>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" 
                                                id="rg" name="personDoc.rg" 
                                                placeholder="Ex: 22.222.222-2" 
                                                onkeypress="return Onlynumbers(event)" 
                                                onkeyup="mascara('##.###.###-#',this,event)" required>
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="rg_agency">
                                        Órgão Emissor<sup class="obrig">*</sup>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" 
                                                id="rg_agency" name="personDoc.rg_agency" 
                                                onkeypress="return Onlychars(event)" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="rg_date">
                                        Data de expedição<sup class="obrig">*</sup>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control"
                                                id="rg_date" name="personDoc.rg_date" 
                                                placeholder="dd/mm/aaaa" required>
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cpf">
                                        Número do CPF<sup class="obrig">*</sup>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" 
                                                id="cpf" 
                                                value="{{$cpf}}"
                                                maxlength="14" disabled>
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileCompany"></label>
                                    <div class="col-md-6">
                                    <p id="cpfInvalido" style="display: none; color: #b30000">CPF INVÁLIDO!</p>
                                </div>
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="admission_date">
                                        Data de Admissão<sup class="obrig">*</sup>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control"   
                                                id="admission_date" name="employee.admission_date" 
                                                placeholder="dd/mm/aaaa" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="situation">
                                        Situação<sup class="obrig">*</sup>
                                    </label>
                                    <a onclick="adicionar_situacao()">
                                        <i class="fas fa-plus w3-xlarge" style="margin-top: 0.75vw"></i>
                                    </a>
                                    
                                    <div class="col-md-6">
                                        
                                        <select class="form-control input-lg mb-md" 
                                                id="situation" name="employee_status" required>
                                            <option selected disabled>Selecionar</option>

                                                <option value="ativo">Ativo</option>
                                                <option value="inativo">Inativo</option>
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="role">
                                        Cargo<sup class="obrig">*</sup>
                                    </label>
                                    <a onclick="adicionar_cargo()">
                                        <i class="fas fa-plus w3-xlarge" style="margin-top: 0.75vw"></i>
                                    </a>
                                    <div class="col-md-6">
                                        <select class="form-control input-lg mb-md" 
                                                name="employeeRole.id" id="role" required>
                                            <option selected disabled>Selecionar</option>

                                            @foreach ($employeeRoleList as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="employeeShift">
                                        Escala<sup class="obrig">*</sup>
                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control input-lg mb-md" 
                                                id="employeeShift" name="employeeTimesheet.id" required>
                                            <option selected disabled value="">Selecionar</option>
                                            
                                            @foreach($employeeTimesheetList as $timesheet)
                                                <option value="{{$timesheet->id}}">{{$timesheet->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <a href="#"><i class="fas fa-plus w3-xlarge"></i></a>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="employeeShiftType">
                                        Tipo<sup class="obrig">*</sup>
                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control input-lg mb-md" 
                                                id="employeeShiftType" name="employeeShiftType.id"  required>
                                            <option selected disabled value="">Selecionar</option>
                                            

                                            @foreach($employeeShiftTypeList as $shiftType)
                                                <option value="{{$shiftType->id}}">{{$shiftType->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <a href="#">
                                        <i class="fas fa-plus w3-xlarge"></i>
                                    </a>
                                </div>
                                <div class="form-group" id="reservista1" style="display: none">
                                    <label class="col-md-3 control-label" for="army_doc_number">
                                        Número do certificado reservista
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="employeeDoc.army_doc_number" class="form-control num_reservista">
                                    </div>
                                </div>
                                <div class="form-group" id="reservista2" style="display: none">
                                    <label class="col-md-3 control-label" for="army_doc_serie">
                                        Série do certificado reservista
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control serie_reservista"
                                                id="army_doc_serie" name="employeeDoc.army_doc_serie" >
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-3">
                                            <input id="enviar" type="submit" class="btn btn-primary"  value="Salvar">
                                            <input type="reset" class="btn btn-default">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @endif

    @endif
    </section>
    </section>
</div>

@endsection

@section('scripts-vendors')

@endsection