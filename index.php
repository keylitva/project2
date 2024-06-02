
<?php
// Establish a database connection (replace placeholders with actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teamzerodb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Query the database to fetch user data
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

session_start();
if (isset($_SESSION['username'])) {
    // Retrieve the username
    $username = $_SESSION['username'];

    // Display a personalized welcome message or other content
    
    
    // You can use $username to personalize the main page for the logged-in user
} 

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angelskar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="/images/angelskar_favicon_black.png">
    <meta property="og:title" content="Angelskar">
    <meta property="og:description" content="AngelSkar Is An Esports Organization That Has Teams In CS2 And Many More Game!">
    <meta property="og:image" content="images/AN_black.png"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
<embed src="images/AN_black.png" type="image/png" width="50" height="50">
    <!-- navbar sections starts  -->
    <header class="header">
        <div class="logo">
        <a href="index.php"><img src="images/namelogo-mini.png" alt="logo" width="256" height="64"></a>
        </div>
        <nav class="navbar">
        <?php 
    if (isset($_SESSION['username'])) {
        
        $username = $_SESSION['username'];
        echo "<a>Welcome, $username!</a>";
    }
    ?>
            
            <a href="index.php#home">Home</a>
            <a href="index.php#features">Rosters</a>
            <a href="index.php#download">Partners</a>
            <a href="#footer">Contact</a>
    
            <!-- "Log out" button that will be displayed when the user is logged in -->
            <a href="logout.php" class="btn" id="loginButton">Log out</a>
        </nav>
        
        

        <div class="fas fa-bars" id="menu-btn"></div>
    </header>
    <!-- navbar sections starts  -->

   
    <!-- home section stars  -->

    <section class="home" id="home">
        <div class="content">
            <h1>AngelSkar</h1>
            <p>AngelSkar is an esports organization that has teams in CS2 and many more game!</p>

            <a href="About-angelskar.php" class="home-btn">Learn more!</a>
        </div>


        <div class="image">
            <img src="images/AN_black.png" alt="illustration-hero">
        </div>
    </section>

    <!-- home section ends -->

    <!-- features sectin starts  -->

    <section class="features" id="features">
        <div class="heading">
            <h1>Teams</h1>
            <p>Our Teams in everygame we are curently competing in!</p>
        </div>


        <div class="row">
            <!-- 1 Tab  -->
            <div class="image">
                <img src="images/cs2-teams.png" alt="illustration-features-tab-1">
            </div>


            <div class="content">
                <h1>Cs2 Teams</h1>
                <p>We Currently have 8 active teams! Including Invicta, Aegis, Atomic, Bravo, DragonFire, Gunners and Wataa!</p>
                <a href="Cs2-teams.php" class="all-btn">Learn more!</a>
            </div>

            <!-- 1 Tab  -->

            <!-- 2 Tab  -->
            <div class="image">
                <img src="images/question.png" alt="illustration-features-tab-2">
            </div>
            <div class="content">
                <h1>Valorant</h1>
                <p>We Currently don't have any active teams in this game!</p>
                <a href="Valorant-teams.php" class="all-btn">Learn more!</a>
            </div>

            <!-- 2 Tab  -->

            <div class="image">
                <img src="images/question.png" alt="illustration-features-tab-3">
            </div>

            <div class="content">
                <h1>Rainbow Six Siege</h1>
                <p>We Currently don't have any active teams in this game!</p>
                <a href="Rainbow_6-teams.php" class="all-btn">Learn more!</a>
            </div>


            <!-- 3 Tab  -->

        </div>
    </section>


    <!-- features sectin ends -->


    <!-- downloads section starts  -->

    <section class="download" id="download">
        <div class="heading">
            <h1>Partners</h1>
            <p>We've got partners that use our product. Please do le us know if you got a partner you'd like us to partner with</p>
        </div>

        <div class="box-container">
            <div class="box">
                <img src="images/logo-chrome.svg" alt="logo-chrome">

                <h3>placeholder</h3>
                <p>placeholder</p>
                <a href="#" class="all-btn">website</a>
            </div>

            <div class="box">
                <img src="images/logo-firefox.svg" alt="logo-firefox">

                <h3>placeholder</h3>
                <p>placeholder</p>
                <a href="#" class="all-btn">website</a>
            </div>

            <div class="box">
                <img src="images/logo-opera.svg" alt="logo-opera">

                <h3>placeholder</h3>
                <p>placeholder</p>
                <a href="#" class="all-btn">website</a>
            </div>
        </div>
    </section>


    <!-- downloads section ends -->



    <!-- footer section starts  -->

   <section class="footer" id="footer">
       <div class="box-container">
           <div class="box">
               <h3>quick links</h3>
               <a href="#"><i class="fas fa-chevron-right"></i>home</a>
               <a href="index.php#features"><i class="fas fa-chevron-right"></i>features</a>
               <a href="index.php#download"><i class="fas fa-chevron-right"></i>partners</a>
               <a href="index.php#footer"><i class="fas fa-chevron-right"></i>contact</a>
            </div>
            
            
            <div class="box">
                <h3>Other Information</h3>
                <a href="About-angelskar.php"><i class="fas fa-chevron-right"></i>About us</a>
                <a href="staff.php"><i class="fas fa-chevron-right"></i>Staff</a>
                <a href="index.php#features"><i class="fas fa-chevron-right"></i>Rosters</a>
                <a href="Legal.php"><i class="fas fa-chevron-right"></i>Legal</a>
           </div>

           <div class="box">
               <h3>Company info</h3>
               <a><i class="fas fa-envelope"></i>support@angelskaresports.com</a>
               <a><i class="fas fa-map-marker-alt"></i>Denmark</a>
               <a><i class="fas fa-address-card"></i>Copyright © 2023 AngelSkar esports</a>
               <a><i class="fas fa-address-card"></i>CVR: 43204467</a>
           </div>

           <div class="box">
               <h3>follow us</h3>
               <a href="https://discord.gg/KC455pA6Fb"><i class="fab fa-discord"></i>Discord</a>
               <a href="https://www.youtube.com/@angelskaresports"><i class="fab fa-youtube"></i>Youtube</a>
               <a href="https://www.twitch.tv/angelskaresports"><i class="fab fa-twitch"></i>Twitch</a>
               <a href="https://twitter.com/AngelskarEsport"><i class="fab fa-twitter"></i>Twitter</a>
           </div>

       </div>


       
   </section>
  
   <script type="module" src="https://cookieconsent.popupsmart.com/js/CookieConsent.js" ></script>
<script type="text/javascript" src="https://cookieconsent.popupsmart.com/js/App.js"></script>
<script>
    popupsmartCookieConsentPopup({
        "siteName" : "AngelskarEsports" ,
        "notice_banner_type": "bottom-dialog",
        "consent_type": "e-privacy",
        "palette": "dark",
        "language": "English",
        "privacy_policy_url" : "#" ,
        "preferencesId" : "#" ,
        
    });
</script>

<noscript>Cookie Consent by <a href="https://popupsmart.com/" rel="nofollow noopener">Popupsmart Website</a></noscript> 



    <script src="js/main.js"></script>
    
   <script>        // Function to check if the user is logged in using AJAX.
        function checkUserLoggedIn() {
            fetch("php/check_login.php")
                .then(response => response.json())
                .then(data => {
                    if (data.loggedIn) {
                        // User is logged in, display their name.
                        const username = data.username; // Get the username from the response.
                        document.getElementById("usernameSpan").textContent = `Welcome, ${username}`;
                    } else {
                        // User is not logged in, display the login button.
                        document.getElementById("loginButton").textContent = "Log in";
                        document.getElementById("loginButton").href = "login.php";
                    }
                });
                
        }
        
        // Call the checkUserLoggedIn function to set the initial button state.
        checkUserLoggedIn(); </script>


   
</body>

</html>