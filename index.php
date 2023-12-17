<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }

        .alert {
   /* display: none;*/
    color: red;
    margin-bottom: 15px;
}
    </style>
</head>
<body>
    <div class="container">


    <div class="alert" id="senhaErrada">
      <?php  if(isset($_SESSION['alerta'])){

                print_r($_SESSION['alerta']);
                unset($_SESSION['alerta']);
            }
            ?>
    </div>

        <h2>Login</h2>
        <form action="controlo/controlo_login.php?rota=login" method="post">
            <div class="form-group">
                <label>Usuário:</label>
                <input type="text" name="usuario" required>
            </div>
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" required name="senha">
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>