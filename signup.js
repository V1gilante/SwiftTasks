
document.getElementById("signup-form").addEventListener("submit", function(event) {
    const passwordInput = document.getElementById("password");
    const passwordError = document.getElementById("passwordError");
    const password = passwordInput.value;
    
    if (password.length <= 8) {
        passwordError.textContent = "Password must be greater than 8 characters";
        event.preventDefault(); // Prevent form submission
    } else {
        passwordError.textContent = ""; // Clear any previous error messages
    }
});
document.getElementById("signup-form").addEventListener("submit", function(event) {
            const passwordInput = document.getElementById("password");
            const confirmPasswordInput = document.getElementById("confirmPassword");
            const passwordError = document.getElementById("passwordError");
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            
            if (password !== confirmPassword) {
                passwordError.textContent = "Passwords do not match.";
                event.preventDefault(); // Prevent form submission
                
                // Set a timeout to clear the error message after 3 seconds (3000 milliseconds)
                setTimeout(function() {
                    passwordError.textContent = "";
                }, 3000);
            }
        });