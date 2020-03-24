$(document).ready(function()
{
    $('.dinheiro').mask('#.##0,00', {reverse: true});
    $('.horas').mask('00:00');
    $('.cartao').mask('0000 0000 0000 0000');
    $('.telefone').mask('(00) 000000000');
});     