<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de la tienda</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #222;
            display:flex;
            width: 100%;
            height:90vh;
        }
        form{
            display: flex;
            width: 90%;
            max-width: 200px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            gap: .5rem;
        }

        input{
            padding: .5rem 1rem;
            border-right: none;
        }

        input, input::placeholder{
            background: inherit;
            color: white;
        }

        button[type="submit"]{
            width: 100%;
            margin: 1rem 0;
            padding: .5rem 0;
            background-color: black;
            color: white;
        }

        button[type="submit"]:focus,
        button[type="submit"]:hover,
        button[type="submit"]:active{
            background-color: white;
            color: black;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <form action="loguear.php" method="post">
        <input type="text" name="user" id="user" placeholder="Usuario">
        <input type="password" name="pass" id="pass" placeholder="Contraseña">
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>