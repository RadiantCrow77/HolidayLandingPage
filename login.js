// eBranch Login event listener, OLD

// let login = document.getElementById("btn");

// login.onclick = function openLoginForm() {
//     document.body.classList.add("showLoginForm");
// }



// eBranch Login event listener
// grab myModal and btn by ID from HTML
let modal = document.getElementById("myModal");
let btn = document.getElementById("btn");
let closeBtn = document.getElementsByClassName("close")[0];

btn.onclick = function openLoginForm() {
    modal.style.display = "block";
}

closeBtn.onclick = function closeLoginForm() {
    modal.style.display = "none";
}