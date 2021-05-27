var header = document.getElementById('headerTop')
var signButton = document.getElementById('signInButton')
var logout = document.getElementById('logout')

logout.addEventListener('click', e => {
    document.location.replace('pages/clear.php')
})
