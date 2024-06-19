<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/29d93e0448.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../header.css">
    <title>header</title>
</head>
<body>
    <header>
        <nav>
            <ul id="navbar">
                <li id="bars_user"><a href="../home/home.php"><i class="fa-solid fa-bars" id="imgBars"></i></a>
                <a href="../acountPagina/acountPagina.php"><div id="imgUser" ><img src="../userPP/<?php echo $_SESSION["profilepicture"] ?>" alt="user icon"></div></a>
                <p id="text"><?php echo 'Welcome back, '. $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></p></li>
                <li><a href="../additem/additem.php"><i class="fa-solid fa-plus" id="imgPlus"></i></a>
                <a href="../inlog/inlogPage.php?session=reset"><i class="fa-solid fa-right-from-bracket" id="signOut"></i></a></li>
            </ul>
        </nav>
    </header>
    
</body>
</html>