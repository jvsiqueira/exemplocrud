<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Aluno</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-utilities.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">

    <style>
        .modal {
            width: 300px;
        }

        .modal-content {
            width: 300px;
        }

        .list-group-item:hover {
            background-color: rgba(59, 57, 57, 0.164) !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light shadow">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Menu App</span>

            <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="modal true" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">MENU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <ul class="list-group list-group-flush">
                        <a href="index.php">
                            <li class="list-group-item">Inicio</li>
                        </a>
                        <a href="cadAdm.php">
                            <li class="list-group-item">Cad Adiministrador</li>
                        </a>
                        <a href="cadAluno.php">
                            <li class="list-group-item">Cad Aluno</li>
                        </a>
                        <a href="listAdm.php">
                            <li class="list-group-item">List Adiministrador</li>
                        </a>
                        <a href="listAluno.php">
                            <li class="list-group-item">List Aluno</li>
                        </a>
                        <a href="#">
                            <li class="list-group-item" onclick="sair()">Log Out</li>
                        </a>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Editar</th>
                <th scope="col">Nome</th>
                <th scope="col">Matricula</th>
                <th scope="col">Adicionado Por</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/EXEMPLO/NEGOCIO/ALUNO/alunoNegocio.php';
            AlunoNegocio::listaTodos();
            ?>
        </tbody>
    </table>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="js/utili.js"></script>
    <script src="js/listAluno.js"></script>

</body>

</html>