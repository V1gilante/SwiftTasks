document.addEventListener('DOMContentLoaded', function() {
    const signupForm = document.querySelector('#signup-form');
    signupForm.addEventListener('submit', (e) => {
        e.preventDefault();

        // Get user info
        const email = signupForm['email'].value;
        const password = signupForm['password'].value;

        // Create a new user with Firebase Authentication
        firebase.auth().createUserWithEmailAndPassword(email, password)
        .then((userCredential) => {
            // User successfully created
            const user = userCredential.user;
            console.log("User created:", user);

            // You can perform additional actions here, like redirecting the user to a different page.
        })
        .catch((error) => {
            // Handle errors
            const errorCode = error.code;
            const errorMessage = error.message;
            console.error("Error:", errorMessage);
        });
    });
});
