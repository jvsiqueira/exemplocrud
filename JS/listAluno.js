function exibeMensagem() {
  Swal.fire("Cadastro Removido", "Recarregando pagina!", "success");

  setTimeout(function () {
    document.location.reload(true);
  }, 3000);
}
function exibeMensagemErr() {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "Tente novamente!",
    footer: '<a href="">Deseja contatar o suporte?</a>',
  });
}
function alertDelet(idA) {
  Swal.fire({
    title: "Deseja excluir o aluno selecionado?",
    showCancelButton: true,
    confirmButtonText: "Excluir",
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      var params = JSON.stringify({
        id: idA,
        operacao: 3,
      });
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
    }
  });
}
