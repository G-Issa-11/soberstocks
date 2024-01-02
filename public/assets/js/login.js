// // sign in button

// const signInBtn = document.querySelector("[data-sign-in-btn]");
// const signUpBtn = document.querySelector("[data-sign-up-btn]");
// const container2 = document.querySelector("[data-container-2]");

// signUpBtn.addEventListener("click", () => {
//     container2.classList.add("sign-up-mode");
// });

// signInBtn.addEventListener("click", () => {
//     container2.classList.remove("sign-up-mode");
// });

// Get the sign-in and sign-up buttons
const signInBtn = document.querySelector("[data-sign-in-btn]");
const signUpBtn = document.querySelector("[data-sign-up-btn]");
const container2 = document.querySelector("[data-container-2]");

// Check if local storage is supported
if (typeof Storage !== "undefined") {
    // Retrieve the sign-up mode from local storage
    const isSignUpMode = localStorage.getItem("signUpMode") === "true";

    // Apply the sign-up mode if it was stored
    if (isSignUpMode) {
        container2.classList.add("sign-up-mode");
    }

    // Add click event listeners
    signUpBtn.addEventListener("click", () => {
        container2.classList.add("sign-up-mode");
        // Store the sign-up mode in local storage
        localStorage.setItem("signUpMode", "true");
    });

    signInBtn.addEventListener("click", () => {
        container2.classList.remove("sign-up-mode");
        // Remove the sign-up mode from local storage
        localStorage.removeItem("signUpMode");
    });
} else {
    // Local storage is not supported
    alert("Sorry, your browser does not support local storage.");
}
