let butmn = document.querySelectorAll('#butmn')
let fonwindow = document.querySelector('.fon')
let btclose = document.querySelector('#close')
console.log(butmn);
console.log(fonwindow);

butmn[0].onclick = function() {
    openaddtrack();
}
btclose.onclick = function() {
    closeaddtrack();
}
function closeaddtrack() {
    fonwindow.style.top = '-1000px'
}

function openaddtrack() {
    fonwindow.style.top = '0'
}