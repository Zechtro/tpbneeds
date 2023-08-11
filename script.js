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