/* alert('hola'); */
/* $(document).ready(function(){     */
/*     $('.slider li').hide(); */
/*     $('.slider li:first').show(); */
/* }) */
//crear variables
var imgItems=$('.slider li').length;//cuenta la cantidad de elementos del slider(imágenes)
var imgPost=1;
var imgant=1;
/* console.log(imgItems); */

//estructura repetitiva for
for(i=1;i<=imgItems;i++){
    $('.pagina').append('<li><i class="fas fa-circle"></i></li>');
}

$('.slider li').hide();//oculta todos los sliders
$('.slider li:first').show();//muestra el primer slider
$('.pagina li:first').css({'color':'#108776'})//dar estilo al primer icono de la página

//crear funciones
$('.pagina li').click(pagina);
$('.right i').click(nextSlider);
$('.left i').click(prevSlider);

function pagina(){
    //muestra el valor de la posición de cada elemento
    var paginaPost=$(this).index()+1;
    /* console.log(paginaPost); */
    $('.slider li').hide();
    $('.slider li:nth-child('+paginaPost+')').fadeIn();

    //agregando color al hacer clic en el simbolo
    $('.pagina li').css({'color':'#858585'})
    $(this).css({'color':'#108776'})
}

function nextSlider(){
    //imgItems=4
    //imgPost=1
    //estructura de control si
    if(imgPost>=imgItems){
        imgPost=1;
    }else{
        imgPost++;
    }

 /* console.log(imgPost);  */
    //mostrar el slider al hacer clic en el ícono
    $('.slider li').hide();
    $('.slider li:nth-child('+imgPost+')').fadeIn();

    //agregar estilo al icono círculo según la avance el slider
    //$('.pagina li').css({'color':'#858585'})
    $('.pagina li:nth-child('+imgPost+')').css({'color':'#108776'});


}
function prevSlider(){
//este código completar
if(imgant>=imgItems){
    imgant=1;
}else{
    imgant++;
}

/* console.log(imgPost);  */
//mostrar el slider al hacer clic en el ícono
$('.slider li').hide();
$('.slider li:nth-child('+imgant+')').fadeIn();

//agregar estilo al icono círculo según la avance el slider
//$('.pagina li').css({'color':'#858585'})
$('.pagina li:nth-child('+imgant+')').css({'color':'#108776'})


}