
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
            <a href="index.php#features">Features</a>
            <a href="index.php#download">Rosters</a>
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
            <h1>About Us</h1>
            <p>Angelskar, the thriving esports organization, proudly fields six Counter-Strike 2 (CS2) teams, showcasing an exceptional commitment to the competitive gaming scene. These six teams form the backbone of the Angelskar League, where they engage in intense battles for supremacy. This league serves as a testament to Angelskar's dedication to fostering talent and promoting esports on a grand scale, making them a dominant presence in the gaming world. With a diverse range of CS2 teams under their banner, Angelskar continues to empower players and fans, further solidifying their role in the ever-expanding esports landscape.</p>
        </div>


        <div class="image">
            <img src="images/angelskar1.png" alt="illustration-hero">
        </div>
    </section>

    <!-- home section ends -->

    <!-- features sectin starts  -->

    <section class="home" id="home">
        <div class="content">
            <h1>Owner And Founder</h1>
            <p>Marcus Draaby, a 21-year-old visionary hailing from Denmark, has made a name for himself in the world of esports. Under the alias "Ninjakiw1," he is the founder and owner of Angelskar, a thriving esports organization. With a passion for gaming that transcends borders, Marcus has cultivated a global community of like-minded gamers who rally under the Angelskar banner.

Despite his young age, Marcus's strategic acumen and leadership have led Angelskar to notable success in various competitive gaming titles. His dedication to nurturing talent and fostering a supportive gaming environment has cemented Angelskar's reputation as a formidable force in the esports world, making Marcus a rising star in the industry.</p>
        </div>


        <div class="image">
            <img src="images/Ninja(owner).webp" alt="illustration-hero">
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

       
   </section>
    <script src="js/main.js"></script>
    <script>
       
function checkUserLoggedIn() {
    fetch("php/check_login.php")
        .then(response => response.json())
        .then(data => {
            if (data.loggedIn) {
                const username = data.username; 
                document.getElementById("usernameSpan").textContent = `Welcome, ${username}`;
            } else {
                document.getElementById("loginButton").textContent = "Log in";
                document.getElementById("loginButton").href = "login.php";
            }
        });
        
}
checkUserLoggedIn();

    </script>
</body>
</html>