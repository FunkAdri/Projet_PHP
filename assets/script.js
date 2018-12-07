function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max + 1));
}

function updateParping() {

    // création d'un background animé
    var parpingcountsmall = 80;
    var parpingglowsmallc = 0;

    var parpingcountmedium = 50;
    var parpingglowmediumc = 0;

    var rheight;
    var rwidth;
    for (var i = 0; i < parpingcountsmall; i++) {
        parpingglowsmallc++;
        rheight = getRandomInt($(document).height());
        rwidth = Math.floor(Math.random() * 90) + 1;
        if (parpingglowsmallc == 10)
        {
            $(".parping__control--small").append('<span class="parping__small parping__glow" style="top:' + rheight + 'px;left:' + rwidth + 'vw;"></span>');
            parpingglowsmallc = 0;
        } else
        {
            $(".parping__control--small").append('<span class="parping__small" style="top:' + rheight + 'px;left:' + rwidth + 'vw;"></span>');
        }
    }

    for (var i = 0; i < parpingcountmedium; i++) {
        parpingglowmediumc++;
        rheight = getRandomInt($(document).height());
        rwidth = Math.floor(Math.random() * 90) + 1;
        if (parpingglowmediumc == 7)
        {
            $(".parping__control--medium").append('<span class="parping__medium parping__glow" style="top:' + rheight + 'px;left:' + rwidth + 'vw;"></span>');
            parpingglowmediumc = 0;
        } else
        {
            $(".parping__control--medium").append('<span class="parping__medium" style="top:' + rheight + 'px;left:' + rwidth + 'vw;"></span>');
        }
    }
    // fin de la fonction pour le background

}

function deleteParping() {
    var smallParping = document.getElementsByClassName('.parping__small');
    $('.parping__small, .parping__medium, .parping__large').fadeOut();
}

updateParping();

$(function() {
var selectedClass = "";
$(".filter").click(function(){
selectedClass = $(this).attr("data-rel");
$("#gallery").fadeTo(100, 0.1);
$("#gallery div").not("."+selectedClass).fadeOut().removeClass('animation');
setTimeout(function() {
$("."+selectedClass).fadeIn().addClass('animation');
$("#gallery").fadeTo(300, 1);
}, 300);
});
});