
                    <h4 class="">Informações Pessoais</h4>
                    <h5 class="required fs-6 mb-4">Campos Obrigatórios</h5>
                    
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label required" for="name">Nome
                        </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"
                                    id="name" name="nome" required>
                            </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label required" for="genero">
                            Gênero
                        </label>
                    <div class="col-md-8">
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                id="generoM" name="genero"
                                value="m" required>
                                <label class="form-check-label" for="generoM">
                                    <i class="fa fa-male" style="font-size: 20px;"></i>
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                id="generoF" name="genero"
                                value="f" required>
                                <label class="form-check-label" for="generoF">
                                    <i class="fa fa-female" style="font-size: 20px;"></i>
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                id="generoN" name="genero"
                                value="" required>
                                <label class="form-check-label" for="generoN">
                                    Não declarado
                                </label>
                        </div>
                    </div>
                    </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-form-label required" for="phone">
                        Telefone
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control"
                            id="telefone" name="telefone"
                            maxlength="11" minlength="10"
                            inputmode="numeric"
                            pattern="^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$"
                            placeholder="Ex: (22)99999-9999" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 control-label required" for="nascimento">
                        Nascimento
                    </label>
                    <div class="col-md-8">
                        <input type="date" class="form-control"
                            id="nascimento" name="nascimento"
                            maxlength="10"
                            placeholder="dd/mm/aaaa" required>
                    </div>
                </div>

                <hr>
                <h4 class="mb-4">Documentação</h4>
                <div class="row mb-3">
                        <label class="col-md-3 col-form-label required" for="cpf">CPF
                        </label>
                            <div class="col-md-8">
                            <input type="text" id="inputCheckCPF" name="cpf"
                                   class="form-control" inputmode="numeric" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                                   maxlength="14" placeholder="Ex. 222.222.222-22" required>
                            </div>
                            <div><p id="cpfInvalido"></p></div>

                            <div class="form-group">
                            <label class="col-md-3 control-label" for="rg">
                                Número do RG<sup class="obrig">*</sup>
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"
                                        id="rg" name="rg" required>
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-3 control-label" for="rg_orgao">
                                Órgão Emissor<sup class="obrig">*</sup>
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"
                                        id="rg_orgao" name="rg_orgao" required>
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-3 control-label" for="rg_data_expedicao">
                                Data de expedição<sup class="obrig">*</sup>
                            </label>
                            <div class="col-md-8">
                                <input type="date" class="form-control"
                                        id="rg_data_expedicao" name="rg_data_expedicao"
                                        required>
                            </div>
                    </div>
                </div>

                <!-- <hr>
                    <div class="panel-footer text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class='btn btn-primary'>Salvar</button>
                                <button type="reset" class="btn btn-danger">Redefinir</button>
                            </div>
                        </div>
                    </div>     -->
           

