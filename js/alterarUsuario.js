$(document).ready(function () {
    $(".alterar").click(function () {
        email = $(this).siblings(".email").html();
        nome = $(this).siblings(".nome").html();

        $("#modalAlterar #email").val(email);
        $("#modalAlterar #nome").val(nome);
    });
});