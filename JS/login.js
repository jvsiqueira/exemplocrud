function login() {
  let loginUsu = document.getElementById("emailUsu").value;
  let senhaUsu = document.getElementById("senhaUsu").value;

  if (String(loginUsu).length > 3 && String(senhaUsu).length > 3) {
    var params = JSON.stringify({
      login: loginUsu,
      senha: senhaUsu,
      operacao: 1,
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
              window.location.href = "index.php";
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
