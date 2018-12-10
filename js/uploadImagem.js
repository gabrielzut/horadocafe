$(document).ready(function () {
    
    $('#formCarousel').on('change', "input#imagem1", function (e) {
        e.preventDefault();
        $("#formCarousel").submit();
    });

    $('#formCarousel').on('change', "input#imagem2", function (e) {
        e.preventDefault();
        $("#formCarousel").submit();
    });

    $('#formCarousel').on('change', "input#imagem3", function (e) {
        e.preventDefault();
        $("#formCarousel").submit();
    });

    $('.slides').hover(function(){
            $(this).addClass("selecionado");
        },function(){
            $(this).removeClass("selecionado");
        }
    )   
});