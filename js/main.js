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

signButton.addEventListener('click', e => {
    modal.style.visibility = 'visible'
    helper.style.display = 'block'
    modal.style.animation = 'pulse .5s both'
    helper.addEventListener('click', e => {
        modal.style.visibility = 'hidden'
        helper.style.display = 'none'
        modal.style.animation = 'bounceOut .5s both'
    })
})

login.addEventListener('input', e => {
    labelLogin.style.visibility = 'visible'
    labelLogin.style.opacity = 1
    labelLogin.style.transform = 'translateY(0px)'
})

pass.addEventListener('input', e => {
    labelPass.style.visibility = 'visible'
    labelPass.style.opacity = 1
    labelPass.style.transform = 'translateY(0px)'
})

setInterval(() => {
    if (login.value == ''){
        labelLogin.style.visibility = 'hidden'
        labelLogin.style.opacity = 0
        labelLogin.style.transform = 'translateY(20px)'
    }
    if (pass.value == ''){
        labelPass.style.visibility = 'hidden'
        labelPass.style.opacity = 0
        labelPass.style.transform = 'translateY(20px)'
    }
},100)


//test корзины
trashCount = 0

for(var i = 0; i < trash.length; i++){
    if (trashCount >= 1000) {
        trashCount /= 1000
        trashCount += 'k'
    } else if (trashCount >= 100) {
        trashCount /= 100
        trashCount += 'h'
    }
    
    if (trashCount > 0){
        trash[i].style.opacity = 1;
        trash[i].style.visibility = 'visible'
    } else {
        trash[i].style.opacity = 0;
        trash[i].style.visibility = 'hidden'
    }

    trash[i].innerHTML = trashCount
}

//burger menu
burger.addEventListener('click', e => {
    burgerModal.style.visibility = 'visible'
    burgerModal.style.opacity = 1
})

burgerLeave.addEventListener('click', e => {
    burgerModal.style.visibility = 'hidden'
    burgerModal.style.opacity = 0
})