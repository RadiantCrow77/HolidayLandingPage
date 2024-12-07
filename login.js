// eBranch Login event listener
// let login = document.getElementsByClassName("btn");
// const buttons = document.getElementsByClassName("btn").addEventListener("click", openLoginForm);


// buttons[0].addEventListener("click", function() {
//     openLoginForm();
// });

// let login = document.getElementsByClassName("btn")[0];
// let login = document.getElementsByClassName("btn");
let login = document.getElementById("btn");

//test, apparently need to wrap code in f(x)

login.onclick = function log() {
    console.log("clicked login btn");
}

// login.onclick = log();

//actual
// login.onclick = openLoginForm();



function openLoginForm() {
    document.body.classList.add("showLoginForm");
}

function closeLoginForm() {
    document.body.classList.remove("showLoginForm");
}



// const modal = document.querySelector('#btn');

// function log() {
//     console.log('clicked');
// }