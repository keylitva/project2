<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Database connection setup (replace placeholders with actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teamzerodb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user data from the database based on the username
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Handle form submission to update user info
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verify old password
        $oldPassword = $_POST["oldPassword"];
        $hashedOldPassword = $row["password"];
        if (password_verify($oldPassword, $hashedOldPassword)) {
            // Password verification succeeded
            $newRank = $_POST["newRank"];
            $updateRankSql = "UPDATE users SET CS2_rank = '$newRank' WHERE username = '$username'";
            $conn->query($updateRankSql);

            $newSteamLink = $_POST["newSteamLink"];
            $updateSteamLinkSql = "UPDATE users SET Steam_link = '$newSteamLink' WHERE username = '$username'";
            $conn->query($updateSteamLinkSql);

            $newUsername = $_POST["newUsername"];
            if (!empty($newUsername) && $newUsername !== $username) {
                $updateUsernameSql = "UPDATE users SET username = '$newUsername' WHERE username = '$username'";
                $conn->query($updateUsernameSql);
                $_SESSION['username'] = $newUsername;
                $username = $newUsername;
            }

            $newPassword = $_POST["newPassword"];
            if (!empty($newPassword)) {
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updatePasswordSql = "UPDATE users SET password = '$hashedNewPassword' WHERE username = '$username'";
                $conn->query($updatePasswordSql);
            }

            echo "Account settings updated successfully.";
        } else {
            echo "Old password verification failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeamZero</title>
    <link rel="stylesheet" href="css/settings-style.css">
    <link rel="icon" type="image/x-icon" href="/images/logo-mini.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- navbar sections starts  -->
    <header class="header">
        <div class="logo">
            <img src="images/namelogo-mini.png" alt="logo" >
        </div>
        <nav class="navbar">
        <?php 
    if (isset($_SESSION['username'])) {
        
        $username = $_SESSION['username'];
        echo "<a href='profile.php?username=$username'>Welcome, $username!</a>";
    }
    ?>
            
            <a href="#home">Home</a>
            <a href="#features">Features</a>
            <a href="#download">Partners</a>
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
            <h1>Settings</h1>
            <p>Here you can change your settings!</p>
        </div>


        <div class="image">
        <h2>Account Settings</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="newRank">CS:GO Rank:</label>
        <select name="newRank">
            <option value="Silver I">Silver I</option>
            <option value="Silver II">Silver II</option>
            <option value="Silver II">Silver III</option>
            <option value="Silver II">Silver IV</option>
            <option value="Silver II">Silver Elite</option>
            <option value="Silver II">Silver Elite Master</option>
            <option value="Silver II">Gold nova I</option>
            <option value="Silver II">Gold nova II</option>
            <option value="Silver II">Gold nova III</option>
            <option value="Silver II">Gold nova Master</option>
            <option value="Silver II">Master Guardian I</option>
            <option value="Silver II">Master Guardian II</option>
            <option value="Silver II">Master Guardian Elite</option>
            <option value="Silver II">Distinguished Master Guardian</option>
            <option value="Silver II">Legendary Eagle</option>
            <option value="Silver II">Legendary Eagle Master</option>
            <option value="Silver II">Supreme Master First Class</option>
            <option value="Silver II">Global Elite</option>
        </select><br>

        <label for="newSteamLink">Steam Profile Link:</label>
        <input type="text" name="newSteamLink" value="<?php echo $row['Steam_link']; ?>"><br>

        <label for="newUsername">New Username:</label>
        <input type="text" name="newUsername" value="<?php echo $row['username']; ?>"><br>

        <label for="newPassword">New Password:</label>
        <input type="password" name="newPassword"><br>
        <label for="oldPassword">Old Password:</label>
        <input type="password" name="oldPassword" required><br>

        <input type="submit" value="Update Settings">
    </form>
        </div>
    </section>

    <!-- home section ends -->

    <!-- features sectin starts  -->




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
               <h3>contact info</h3>
               <a href="#"><i class="fas fa-envelope"></i>support@angelskaresports.com</a>
               <a href="#"><i class="fas fa-map-marker-alt"></i>Denmark</a>
           </div>

           <div class="box">
               <h3>follow us</h3>
               <a href="https://discord.gg/KC455pA6Fb"><i class="fab fa-discord"></i>Discord</a>
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

<?php
// Close the database connection
$conn->close();
?>
