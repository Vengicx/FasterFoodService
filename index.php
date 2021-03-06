<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faster Food Service - Area Restrita</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styleIndex.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
</head>
<body>
    <div id="cardLogin">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <form action="verify.php" method="post">
                    <h4><i class="fa fa-warning"></i> Área Restrita</h4>
                    <div class="form-group">
                        <label for="loginUser">Usuário</label>
                        <input type="text" name="loginUser" class="form-control" placeholder="Digite seu usuário" required value="admin">
                    </div>
                    <div class="form-group">
                        <label for="passwordUser">Senha</label>
                        <input type="password" name="passwordUser" class="form-control" placeholder="Digite sua senha" value="f@ster123" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Entrar</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>