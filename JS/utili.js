const caminho = "http://localhost/";

function camposIncompletos() {
  Swal.fire({
    icon: "error",
    title: "Campos Incompletos...",
    text: "Tente novamente!",
    footer: "",
  });
}

function exibeMensagemErr() {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "Tente novamente!",
    footer: '<a href="">Deseja contatar o suporte?</a>',
  });
}

function sair() {
  var params = JSON.stringify({
    operacao: 2,
  });

  var url = caminho + "EXEMPLO/NEGOCIO/login.php";
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
            window.location.href = "login.php";
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
