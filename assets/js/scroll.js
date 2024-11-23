let progressbar=document.querySelector('.progress');
function Scrollbar(){
    let scrollTop=document.documentElement.scrollTop;//es lo que avanza
    let scrollHeight=document.documentElement.scrollHeight;
    let clientHeight=document.documentElement.clientHeight;

    let windowHeight=scrollHeight - clientHeight;
    let porcentaje=scrollTop/windowHeight * 100;

    progressbar.style.width=porcentaje+'%';
}
window.addEventListener('scroll', Scrollbar);