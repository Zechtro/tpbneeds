// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "grid";
    if (slideIndex == 1) {dots[0].className += " active"}
    if (slideIndex == 2) {dots[4].className += " active"}
    if (slideIndex == 3) {dots[8].className += " active"}
}

function loadGuestModeMain(isLoggedIn) { 
    if (isLoggedIn) {
        let link = document.getElementById('login-or-logout');
        link.href = "./user/logout.php";
        link.innerHTML = "Log Out";
    }
}

function loadGuestMode(isLoggedIn) { 
    if (isLoggedIn) {
        let link = document.getElementById('login-or-logout');
        link.href = "../user/logout.php";
        link.innerHTML = "Log Out";
    }
}

function handleGuestAccessMain(isLoggedIn) {
    if (!isLoggedIn) {
        let links = document.getElementsByClassName('user-only-link');
        for (let i = 0; i < links.length; i++) {
            let link = links[i];
            link.href = "./user/login.php";
    }
}
}

function handleGuestAccess(isLoggedIn) {
    if (!isLoggedIn) {
        let links = document.getElementsByClassName('user-only-link');
        for (let i = 0; i < links.length; i++) {
            let link = links[i];
            link.href = "../user/login.php";
    }
}
}
