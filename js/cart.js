var header = document.getElementById('headerTop')
var signButton = document.getElementById('signInButton')
var modal = document.getElementById('modal')
var helper = document.getElementById('helper')
var login = document.getElementById('log')
var pass = document.getElementById('pass')
var labelLogin = document.getElementById('l-log')
var labelPass = document.getElementById('l-pass')
var trash = document.querySelectorAll('.trash-count')
var burger = document.getElementById('burger')
var burgerModal = document.getElementById('burgerModal')
var burgerLeave = document.getElementById('burgerLeave')
var registerButton = document.getElementById('registerButton')
var modalReg = document.getElementById('modalReg')
var loginButton = document.getElementById('loginButton')
var user = document.getElementById('user')
var logout = document.getElementById('logout')

var offset = (el) => {
    const rect = el.getBoundingClientRect(),
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
    scrollTop = window.pageYOffset || document.documentElement.scrollTop
    return {top: rect.top + scrollTop, left: rect.left + scrollLeft}
}

window.addEventListener('scroll', e => {
    var aHeader = header.offsetHeight
    var headerOffset = offset(header).top
    var aStart = 10

    var itemPoint = window.innerHeight - aHeader / aStart

    if (aHeader > window.innerHeight) itemPoint = window.innerHeight - window.innerHeight / aStart

    if ((pageYOffset > headerOffset - itemPoint) && pageYOffset < (headerOffset + aHeader)) header.classList.add('_anim') 
    else header.classList.remove('_anim')

    if (pageYOffset == 0) header.classList.remove('_anim')

})

user.addEventListener('click', e => {
    document.location.replace('user.php')
})

logout.addEventListener('click', e => {
    document.location.replace('pages/clear.php')
})
