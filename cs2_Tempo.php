
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
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
    <section class="home" id="home">
        <div class="content">
            <h1>Tempo</h1>
            <p>An AngelSkar Team that compete's in CS2!</p>

            
        </div>


        <div class="image">
            <img src="images/Tempo_Logo.png" alt="illustration-hero">
        </div>
    </section>
    <section class="features" id="features">


    <div class="row heading">
            <!-- 1 Tab  -->
            <div class="image scale">
            <h1>Name IGN Surname</h1>
            <p>Captain</p>
                <img src="images/Tempo_Logo.png" alt="illustration-features-tab-3" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" width="80%" height="80%">
            <p> hello</p>
            </div>
            <div class="image scale">
            <h1>Name IGN Surname</h1>
            <p>Vice Captain</p>
                <img src="images/Tempo_Logo.png" alt="illustration-features-tab-3" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" width="80%" height="80%">
            <p> hello</p>
            </div>
        </div>   
    <div class="row heading">
            <!-- 1 Tab  -->
            <div class="image scale">
            <h1>Name IGN Surname</h1>
            <p>Role</p>
                <img src="images/Tempo_Logo.png" alt="illustration-features-tab-3" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" width="80%" height="80%">
            <p> hello</p>
            </div>
            <div class="image scale">
            <h1>Name IGN Surname</h1>
            <p>Role</p>
                <img src="images/Tempo_Logo.png" alt="illustration-features-tab-3" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" width="80%" height="80%">
            <p> hello</p>
            </div>
            <div class="image scale">
            <p>Role</p>
            <h1>Name IGN Surname</h1>
                <img src="images/Tempo_Logo.png" alt="illustration-features-tab-3" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" width="80%" height="80%">
            <p> hello</p>
            </div>
        </div>
        <div class="row heading">
            <!-- 1 Tab  -->
            <div class="image scale">
            <h1>Name IGN Surname</h1>
            <p>Role</p>
                <img src="images/Tempo_Logo.png" alt="illustration-features-tab-3" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" width="80%" height="80%">
            <p> hello</p>
            </div>
            <div class="image scale">
            <h1>Name IGN Surname</h1>
            <p>Role</p>
                <img src="images/Tempo_Logo.png" alt="illustration-features-tab-3" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" width="80%" height="80%">
            <p> hello</p>
            </div>
            <div class="image scale">
            <h1>Name IGN Surname</h1>
            <p>Role</p>
                <img src="images/Tempo_Logo.png" alt="illustration-features-tab-3" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" width="80%" height="80%">
            <p> hello</p>
            </div>
        </div>
 
    </section>


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
               <h3>contact info</h3>
               <a><i class="fas fa-envelope"></i>support@angelskaresports.com</a>
               <a><i class="fas fa-map-marker-alt"></i>Denmark</a>
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

    <!-- footer section ends -->


    <script src="js/main.js"></script>
    <script>
        // Function to check if the user is logged in using AJAX.
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
checkUserLoggedIn();

    </script>
</body>

</html>