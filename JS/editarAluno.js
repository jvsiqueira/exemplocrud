function exibeMensagem() {
  Swal.fire("Cadastro Atualizado", "Recarregando pagina!", "success");

  setTimeout(function () {
    document.location.href = "listAluno.php";
  }, 5000);
}
function exibeMensagemErr() {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "Tente novamente!",
    footer: '<a href="">Deseja contatar o suporte?</a>',
  });
}
function camposIncompletos() {
  Swal.fire({
    icon: "error",
    title: "Campos Incompletos...",
    text: "Tente novamente!",
    footer: "",
  });
}

function atualizaAluno() {
  var nomeAluno = document.getElementById("nomeA").value;
  var matriculaA = document.getElementById("matriculaA").value;
  var idAluno = document.getElementById("idAluno").value;
  var params = JSON.stringify({
    id: idAluno,
    nome: nomeAluno,
    matricula: matriculaA,
    operacao: 2,
  });
  if (String(nomeAluno).length > 2 && String(matriculaA).length > 1) {
    var url = caminho + "EXEMPLO/NEGOCIO/ALUNO/controlAluno.php";
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
          }, 300);
        }
      }
    };

    xmlHttp.open("POST", url, true);
    xmlHttp.setRequestHeader("Access-Control-Allow-Origin", "*");
    xmlHttp.setRequestHeader(
      "Access-Control-Allow-Headers",
      "Origin, X-Requested-With, Content-Type, Accept"
    );
    xmlHttp.send(formData);
  } else {
    camposIncompletos();
  }
}
