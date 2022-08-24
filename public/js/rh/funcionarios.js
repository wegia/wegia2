/** 
 * Tratamento de CPF
 * 
 */
const inputCheckCPF = document.getElementById('inputCheckCPF')

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

const validaCPF = cpf => {
    let cpfDigitado = cpfInput.value
    console.log(cpf)
    return true;
}

// se o input estiver carregado na tela, 
// associar o evento keyup
if (inputCheckCPF) {
    inputCheckCPF.addEventListener('keyup', ()=>{
        let cpfDigitado = cpfInput.value
        let cpfTratado = removeCaracteresCPF(cpfDigitado)
        cpfTratado = acrescentaFormato(cpfTratado)
        cpfInput.value = cpfTratado
    })

}

/** 
 * Tratamento de foto
 * 
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

inputArquivoImagem.addEventListener('change', function(e){
    previewFile(e, "#fotoPreview", "#fotoAvatar")
})

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
            document.querySelector("#fieldReservista").style.display="block"
        } else {
            document.querySelector("#fieldReservista").style.display="none"
        }
    })
})



/**
 * 
 * Cadastrando em tabelas auxiliares via AJAX (para não perder dados do form)
 */

const recarregaCargos =  () => {
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
    let myRequest = new Request('/rh/cargos', config)
    
    const selectCargos = document.querySelector("#cargo")
    selectCargos.innerHTML = "<option selected disabled>Selecionar</option>"

    fetch(myRequest)
        .then(resp => resp.json())
        .then(cargos => {
            cargos.forEach(cargo => {
                selectCargos.innerHTML += `<option value="${cargo.id}">${cargo.nome}</option>`
            })
    })
      
}

//recuperando o token csrf:
const btnNovoCargo = document.getElementById("addCargo")
btnNovoCargo.addEventListener("click", function() {
    const csrfToken = document.querySelector("input[name='_token']").value
    const nome = document.getElementById("iptNovoCargo").value
    if (nome !== "") {
        fetch("/rh/cargos", {
            method: "POST",
            headers: {
                "X-CSRF-Token": csrfToken,
                "Content-Type": "application/json",
                Accept: "application/json", 
            },
            credentials: 'same-origin',
            body: JSON.stringify({'nome':nome})
        })
        .then((response) => response.json())
        .then((data) => {
            console.log("Success:", data)
            //atualizando a página
            recarregaCargos()
            document.querySelector("#iptNovoCargo").value=""
            
            $("#novoCargoModal").modal('hide')
        })
        .catch((error) => {
            console.error("Error:", error)
        });
     
    }
})