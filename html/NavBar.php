<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/nav.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<!--Favicon-->
<link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/> 
  <title></title>
</head>
<body>
    <nav class="nav">
        <div class="logo-holder">
   
    <img src="../images/logo.png" class="logo">
    </div>       
    <ul>
                <li><a href="#">Travel guides</a></li>
                <li><a href="#">Famous Places</a></li>
                <li><a href="#">Contact Us</a></li>
                <button class="btn"><a href="../index2.php">Se connecter</a></button>
            </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>   
        </div>
    </nav>

<script type="text/javascript">


//burger pour rendre la navbar plus responsive
const navSlide = () =>{
const burger = document.querySelector('.burger');
const nav = document.querySelector('nav');
const navLinks = document.querySelector('nav ul')


burger.addEventListener('click', () =>{
    navLinks.classList.toggle('nav-active')

    

    burger.classList.toggle('toggle');
});
}



navSlide(); 

</script>

</html>