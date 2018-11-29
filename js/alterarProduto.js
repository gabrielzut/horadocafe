$(document).ready(function () {
    $(".alterar").click(function () {
        id = $(this).siblings(".id").html();
        nome = $(this).siblings(".nome").html();
        descricao = $(this).siblings(".descricao").html();
        observacao = $(this).siblings(".observacao").html();
        preco = $(this).siblings(".preco").html();

        $("#modalAlterar #id").val(id);
        $("#modalAlterar #nome").val(nome);
        $("#modalAlterar #descricao").val(descricao);
        $("#modalAlterar #observacao").val(observacao);
        $("#modalAlterar #preco").val(preco);
    });
});