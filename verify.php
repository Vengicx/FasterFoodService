<?php
    session_start();

    if(isset ($_SESSION["attempts"])){
        $_SESSION["attempts"]++;
        
    }else{
        $_SESSION["attempts"] = 1;

    }

    if($_SESSION["attempts"] > 10){
        echo "<script>alert('Você errou as credenciais 10 vezes, tente novamente mais tarde!');history.back();</script>";
        exit;
    }

    if($_POST){

        $loginUser = $passwordUser = "";

        if(isset($_POST["loginUser"])){
            $loginUser = trim ($_POST["loginUser"]);

        }

        if(isset($_POST["passwordUser"])){
            $passwordUser = trim ($_POST["passwordUser"]);

        }

        if(empty($loginUser)){
			echo "<script>alert('Preencha o login');history.back();</script>";
			exit;
        }elseif(empty($passwordUser)){
			echo "<script>alert('Preencha a senha');history.back();</script>";
			exit;
        }else{
            include "app/connect.php";

            $sql = "select * from usuario where login = ? limit 1";

            $query = $pdo->prepare($sql);
            $query->bindParam(1, $loginUser);
            $query->execute();

            $data = $query->fetch(PDO::FETCH_OBJ);

            if(empty($data->id)){
                echo "<script>alert('Usuário não encontrado');history.back();</script>";

            }elseif($data->ativo != "1"){
                echo "<script>alert('Este usuário não está ativo');history.back();</script>";

            }else{
                $_SESSION["system"] = array("id"=>$data->id,"login"=>$data->login,"nome"=>$data->nome);
                header("Location: home.php");

            }

        }

    }

