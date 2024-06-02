<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angelskar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-login.css">
    <link rel="icon" type="image/x-icon" href="/images/angelskar_favicon_black.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- navbar sections starts  -->
    <header class="header">
        <div class="logo">
        <a href="index.php"><img src="images/namelogo-mini.png" alt="logo" width="256" height="64"></a>
        </div>
        <nav class="navbar">
            
            <a href="index.php#home">Home</a>
            <a href="index.php#features">Rosters</a>
            <a href="index.php#download">Partners</a>
            <a href="#footer">Contact</a>
        </nav>
        
        

        <div class="fas fa-bars" id="menu-btn"></div>
    </header>
    <!-- navbar sections starts  -->

   
    <!-- home section stars  -->

    <section class="home" id="home">
        <div class="content">
        <div class="wrapper">
         <div class="title">
            Login!
         </div>
         <form action="php/login.php" method="post">
            <div class="signup-link">
                <a href="index.php" style="color:grey;"> Back to site! </a>
              </div>
            <div class="field">
                <input type="text" name="username" placeholder="Username">  
               
            </div>
            <div class="field">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="register.html">Signup now</a>
            </div>
            <div class="signup-link">
                <a href="#">Terms of service</a>
              </div>
         </form>
      </div>
        </div>


        <div class="image">
            <img src="images/AN_black.png" alt="illustration-hero">
        </div>
    </section>
  

    <script src="js/main.js"></script>



   
</body>

</html>
