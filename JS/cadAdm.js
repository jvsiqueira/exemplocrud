function exibeMensagem() {
    Swal.fire(
        'Cadastro Realizado',
        'Recarregando pagina!',
        'success'
    )


    setTimeout(function () {
        document.location.reload(true);
    }, 5000)
}
function exibeMensagemErr() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Tente novamente!',
        footer: '<a href="">Deseja contatar o suporte?</a>'
    })
}
function camposIncompletos() {
    Swal.fire({
        icon: 'error',
        title: 'Campos Incompletos...',
        text: 'Tente novamente!',
        footer: ''
    })
}

function salvaAdm() {


    var loginUsu = document.getElementById('exampleInputEmail1').value;
    var senhaUsu = document.getElementById('exampleInputPassword1').value;
    var params = JSON.stringify({
        login: loginUsu,
        senha: senhaUsu,
        operacao: 1

    });
    if (String(loginUsu).length > 2 && String(senhaUsu).length > 1) {

        var url = caminho + "EXEMPLO/NEGOCIO/ADM/controlAdm.php";
        var xmlHttp = new XMLHttpRequest();

        let formData = new FormData();
        formData.append("dados", params);
        xmlHttp.onload = function () {
            if (xmlHttp.readyState === xmlHttp.DONE) {
                if (xmlHttp.status == 200) {
                    setTimeout(function () {
                        //var retorno = JSON.parse(xmlHttp.responseText);
                        var retorno = xmlHttp.responseText;
                        console.log(xmlHttp.responseText);
                        if (retorno == 1) {
                            exibeMensagem();
                        } else {
                            exibeMensagemErr();
                        }
                    }, 300)
                }
            }
        }

        xmlHttp.open("POST", url, true);
        xmlHttp.setRequestHeader("Access-Control-Allow-Origin", "*");
        xmlHttp.setRequestHeader("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
        xmlHttp.send(formData);
    } else {
        camposIncompletos();
    }
}