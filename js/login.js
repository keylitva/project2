document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");

    // Simulated user data stored in a JSON object (replace with your own data storage)
    let usersData = {};

    // Register a new user
    registerForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const username = document.getElementById("registerUsername").value;
        const password = document.getElementById("registerPassword").value;

        // Hash the password before saving it (you can use a library like bcrypt for production)
        const hashedPassword = hashPassword(password);

        // Simulate saving user data to an object (replace with your own data storage)
        usersData[username] = hashedPassword;

        alert("Registration successful!");
    });

    // Login a user
    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const username = document.getElementById("loginUsername").value;
        const password = document.getElementById("loginPassword").value;

        // Retrieve the hashed password for the given username (replace with your own data retrieval logic)
        const storedHashedPassword = usersData[username];

        if (!storedHashedPassword) {
            alert("User not found");
        } else if (checkPassword(password, storedHashedPassword)) {
            alert("Login successful!");
        } else {
            alert("Invalid password");
        }
    });

    // Simulated password hashing function (replace with a secure hashing library for production)
    function hashPassword(password) {
        // In a real application, use a secure hashing algorithm like bcrypt.
        // For simplicity, this example uses a basic hashing function.
        return password + "hashed"; // Replace with a secure hashing function.
    }

    // Simulated password verification function (replace with a secure verification logic)
    function checkPassword(password, storedHashedPassword) {
        // In a real application, use a secure verification method.
        // For simplicity, this example uses basic comparison.
        return password + "hashed" === storedHashedPassword; // Replace with a secure comparison.
    }
});
