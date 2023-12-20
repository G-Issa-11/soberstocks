// sign in button

const signInBtn = document.querySelector("[data-sign-in-btn]");
const signUpBtn = document.querySelector("[data-sign-up-btn]");
const container2 = document.querySelector("[data-container-2]");

signUpBtn.addEventListener("click", () => {
    container2.classList.add("sign-up-mode");
});

signInBtn.addEventListener("click", () => {
    container2.classList.remove("sign-up-mode");
});
