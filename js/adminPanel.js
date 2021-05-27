var header = document.getElementById('headerTop')
var signButton = document.getElementById('signInButton')
var logout = document.getElementById('logout')
var lastP = document.getElementById('lastPurs')
var lastPI = document.getElementById('lastPInfo')
var newRest = document.getElementById('newRest')
var newPost = document.getElementById('newPost')


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

logout.addEventListener('click', e => {
    document.location.replace('../pages/clear.php')
})

lastP.addEventListener('click', e => {
    lastPI.classList.toggle('lastP-hide')
})

newRest.addEventListener('click', e => {
    newPost.classList.toggle('newR-post-hide')
})
