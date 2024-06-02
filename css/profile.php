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

// Retrieve username from the URL
$username = $_GET["username"];

// Query the database to fetch user data
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch user data
    $user_data = $result->fetch_assoc();
    
    // Display user information on the profile page
    
    
    $username = $user_data["username"];
    $email = $user_data["email"];
    $steam = $user_data["Steam_link"];
    $rank = $user_data["CS2_rank"];
    
    // Display other user data fields here
} else {
    echo "User not found.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mohammad Sahragard">
    <title>Profile</title>
    <!-- import font icon (fontawesome) -->
    <script src="https://kit.fontawesome.com/b8b432d7d3.js" crossorigin="anonymous"></script>
    <!-- import css file (style.css) -->
    <link rel="stylesheet" href="css/profile-style.css">
</head>

<body>
    <div class="container">

        <div class="profile-card">
            <div class="profile-header"><!-- profile header section -->
                <div class="main-profile">
                    <div class="profile-image"></div>
                    <div class="profile-names">
                        <h1 class="username"><?php echo $username; ?></h1>
                    </div>
                </div>
            </div>

            <div class="profile-body"><!-- profile body section -->
            
                <div class="profile-actions">
                    
                    <button class="follow">Follow</button>
                    <button class="message">Message</button>
                    <section class="bio">
                        <div class="bio-header">
                            <i class="fa fa-info-circle"></i>
                            Bio
                        </div>
                        <p class="bio-text">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        </p>
                    </section>
                </div>

                <div class="account-info">
                    <div class="data">
                        <div class="important-data">
                            <section class="data-item">
                                <h3 class="value">104</h3>
                                <small class="title">Post</small>
                            </section>
                            <section class="data-item">
                                <h3 class="value">21K</h3>
                                <small class="title">Follower</small>
                            </section>
                            </section>
                            <section class="data-item">
                                <h3 class="value">51</h3>
                                <small class="title">Following</small>
                            </section>
                        </div>
                    </div>

                    <div class="social-media">
                        <span>Follow me in:</span>
                        <a href="" class="media-link"><i class="fab fa-facebook-square"></i></a>
                        <a href="https://twitter.com/MammadSahragard" class="media-link"><i class="fab fa-twitter-square"></i></a>
                        <a href="https://www.linkedin.com/in/mohammadsahragard/" class="media-link"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.instagram.com/mammad.sahragard/" class="media-link"><i class="fab fa-instagram-square"></i></a>
                        <a href="https://github.com/MohammadSahragard" class="media-link"><i class="fab fa-github-square"></i></a>
                        <a href="index.php" class="go-back " style="color:grey;">Back to main site!</a>
                    </div>

                    <div class="last-post">
                        <div class="post-cover">
                        <h3 class="post-title">Game info!</h3>
                        <h4>CS:GO Rank: <?php echo $rank; ?></h4>
                        <h4>Steam Profile: <a href="<?php echo $steam; ?>" target="_blank"><?php echo $username; ?></a></h4>
                        </div>
                        <h3 class="post-title">Current team</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>