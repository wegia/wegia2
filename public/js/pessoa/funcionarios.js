/**
 * Tratamento de CPF
 *
 */

const removeCaracteresCPF = cpf => {
    const tamanho = cpf.length
    if ('1234567890'.indexOf(cpf[tamanho-1]) == -1) {
        return cpf.substr(0, tamanho-1)
    }
    return cpf
}

const acrescentaFormato = cpf => {
    //000.000.000-00
    if(cpf.length == 3 || cpf.length == 7)
        return cpf += "."
    if(cpf.length == 11)
        return cpf += "-"
    return cpf
}

const trataCPF = cpfInput => {
    let cpfDigitado = cpfInput.value
    let cpfTratado = removeCaracteresCPF(cpfDigitado)
    cpfTratado = acrescentaFormato(cpfTratado)
    cpfInput.value = cpfTratado
}

const inputCheckCPF = document.getElementById('inputCheckCPF')

// se o input estiver carregado na tela,
// associar o evento keyup
if (inputCheckCPF) {
    inputCheckCPF.addEventListener('keyup', (e)=> {
        //Se tecla for backspace ou delete
        if(e.key.toString() == "Backspace" || e.key == "Delete") {
            //remover o ponto
            if (inputCheckCPF.value.length == 3) //primeiro ponto
                inputCheckCPF.value = inputCheckCPF.value.substring(0, 2);
            if (inputCheckCPF.value.length == 7) //segundo ponto
                inputCheckCPF.value = inputCheckCPF.value.substring(0, 6);
            if (inputCheckCPF.value.length == 11) // traço
                inputCheckCPF.value = inputCheckCPF.value.substring(0, 10);
        }

        trataCPF(inputCheckCPF);
    })
}


const removeCaracteresPhone = phone => {
    const tamanho = phone.length
    if ('1234567890'.indexOf(phone[tamanho-1]) == -1) {
        return phone.substr(0, tamanho-1)
    }
    return phone
}

const acrescentaFormatoPhone = phone => {
    //000.000.000-00
    //if(phone.length === 2)
    //    return `(${phone})`
    let ddd, prefixo, sufixo
    if (phone.length === 10) {
        ddd = phone.substring(0,2)
        prefixo = phone.substring(2,6)
        sufixo = phone.substring(6,10)
        console.log(ddd)
        console.log(prefixo)
        console.log(sufixo)
        return `(${ddd})${prefixo}-${sufixo}`
    }
    if (phone.length === 11) {
        ddd = phone.substring(0, 2)
        prefixo = phone.substring(2, 7)
        sufixo = phone.substring(7, 11)
        console.log(ddd)
        console.log(prefixo)
        console.log(sufixo)
        return `(${ddd})${prefixo}-${sufixo}`
    }

    //if(phone.length === 10) return "("+ phone.substring(0,2) + ")" + phone.substring(3,4) + "-" + phone.substring(5,10)
    //if(phone.length === 11) return "("+ phone.substring(0,2) + ")" + phone.substring(3,5) + "-" + phone.substring(6,11)
    return phone
}

const acrescentaTraco = phone => {
    if(phone.length === 2)
        return `(${phone})`

    //if(phone.length === 12) return phone.substring(0,8) + "-" + phone.substring(9,12)
    if(phone.length === 13) return phone.substring(0,9) + "-" + phone.substring(10,13)
    return phone
}
const trataPhone = phoneInput => {
    let phoneDigitado = phoneInput.value
    console.log(phoneDigitado)
    let phoneTratado = removeCaracteresPhone(phoneDigitado)
    phoneTratado = acrescentaFormatoPhone(phoneTratado)
    console.log(phoneTratado)
    phoneInput.value = phoneTratado
}

const inputCheckPhone = document.getElementById('telefone')

// se o input estiver carregado na tela,
// associar o evento keyup
    inputCheckPhone.addEventListener('keyup', (e) => {
        inputCheckPhone.value = removeCaracteresPhone(inputCheckPhone.value)
    })
    inputCheckPhone.addEventListener('blur', (e)=> {
        //Se tecla for backspace ou delete
        // if(e.key.toString() == "Backspace" || e.key == "Delete") {
        //     //remover o ponto
        //     if (inputCheckPhone.value.length == 3) //primeiro ponto
        //         inputCheckCPF.value = inputCheckCPF.value.substring(0, 2);
        //     if (inputCheckCPF.value.length == 7) //segundo ponto
        //         inputCheckCPF.value = inputCheckCPF.value.substring(0, 6);
        //     if (inputCheckCPF.value.length == 11) // traço
        //         inputCheckCPF.value = inputCheckCPF.value.substring(0, 10);
        // }

        trataPhone(inputCheckPhone);
    })

/**
 * A função previewFile pega uma imagem do computador do
 *   cliente, transforma em base64 e exibe em um <img>
 *
 * @params:
 *   - event: evento disparado no input.file que irá carregar a imagem
 *   - seletorPreview: seletor CSS para a <img> que exibirá a imagem
 *   - seletorAvatar: seletor CSS para o <i> com o avatar
 *
 *  Estrutura padrão de um elemento de exibição de imagens:
 *  <div>
 *      <input type="file">
 *      <div class="form-foto">
 *          <img>
 *          <i>
 *      </div>
 *  </div>
 */
function previewFile(event, seletorPreview, seletorAvatar) {
    const preview = document.querySelector(seletorPreview);
    const avatar = document.querySelector(seletorAvatar);
    let reader = new FileReader();
    let file = event.target.files[0];

    reader.readAsDataURL(file);
    reader.onloadend = () => {
        preview.src = reader.result;
        preview.style.display = "block";
        avatar.style.display = "none";
    };
}

const inputArquivoImagem = document.querySelector("#inputArquivoImagem")

if (inputArquivoImagem) {
    inputArquivoImagem.addEventListener('change', function(e){
        previewFile(e, "#fotoPreview", "#fotoAvatar")
    })
}

/**
 * Tratamento de Genero
 *
 */

const inputsGenero = document.querySelectorAll('input[name="pessoa.genero"]')
let genero = null
inputsGenero.forEach(radioButton => {
    radioButton.addEventListener('change', () => {
        genero = radioButton.value ?? null
        if(genero === "m") {
            document.querySelector("#fieldReservista").style.display="flex"
        } else {
            document.querySelector("#fieldReservista").style.display="none"
        }
    })
})

/**
 *
 * Cadastrando em tabelas auxiliares via AJAX (para não perder dados do form)
 */

const recarregaCombo =  (url, seletorCombo) => {
    const csrfToken = document.querySelector("input[name='_token']").value
    let config = {
        method: 'GET',
        headers: {
            "X-CSRF-Token": csrfToken,
            "Content-Type": "application/json",
            Accept: "application/json",
        },
        credentials: 'same-origin'
    }
    let myRequest = new Request(url, config)

    const selectObj = document.querySelector(seletorCombo)
    selectObj.innepessoaTML = "<option selected disabled>Selecionar</option>"

    fetch(myRequest)
        .then(resp => resp.json())
        .then(lista => {
            lista.forEach(obj => {
                selectObj.innepessoaTML += `<option value="${obj.id}">${obj.nome}</option>`
            })
    })
}

const salvaDadoAuxiliar = (url, seletorModal, seletorCombo, seletorIptNome, seletorIptDesc="") => {
    const csrfToken = document.querySelector("input[name='_token']").value
    const nome = document.querySelector(seletorIptNome).value
    const descricao = (seletorIptDesc !== "") ? document.querySelector(seletorIptDesc).value : ""
    if (nome !== "") {
        fetch(url, {
            method: "POST",
            headers: {
                "X-CSRF-Token": csrfToken,
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            credentials: 'same-origin',
            body: JSON.stringify({'nome':nome, 'descricao':descricao})
        })
        .then((response) => response.json())
        .then((data) => {
            recarregaCombo(url, seletorCombo)
            document.querySelector(seletorIptNome).value=""
            $(seletorModal).modal('hide')
        })
        .catch((error) => {
            console.error("Error:", error)
        });
    }
}

////////////////
/// Situação ///
const btnNovaSituacao = document.querySelector("#addSituacao")
if (btnNovaSituacao) {
    btnNovaSituacao.addEventListener("click", function() {
        salvaDadoAuxiliar('/pessoa/situacoes', '#novaSituacaoModal', '#situacao', '#iptNovaSituacao')
    })
}
/////////////
/// Cargo ///
const btnNovoCargo = document.querySelector("#addCargo")
if (btnNovoCargo) {
    btnNovoCargo.addEventListener("click", function() {
        salvaDadoAuxiliar('/pessoa/cargos', '#novoCargoModal', '#cargo', '#iptNovoCargo')
    })
}

////////////////////
////// Escala //////
const btnNovaEscala = document.querySelector("#addEscala")
if (btnNovaEscala) {
    btnNovaEscala.addEventListener("click", function() {
        salvaDadoAuxiliar('/pessoa/escalas', '#novaEscalaModal', '#escala', '#iptNovaEscala', '#iptNovaEscalaDescricao')
    })
}

////////////////////
// Tipo de Escala //
const btnNovoTipoEscala = document.querySelector("#addTipoEscala")
if(btnNovoTipoEscala) {
    btnNovoTipoEscala.addEventListener("click", function() {
        salvaDadoAuxiliar('/pessoa/tipoEscalas', '#novoTipoEscalaModal', '#tipoEscala', '#iptNovoTipoEscala')
    })
}
