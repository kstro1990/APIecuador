function postCredito (){
    var corriente = $('select[id=corriente]').val();
    var creditoP0 = $("#creditoP0").val();
    var creditoP1 = $("#creditoP1").val();
    var creditoP2 = $("#creditoP2").val();
    var creditoP3 = $("#creditoP3").val();
    var creditoD0 = $("#creditoD0").val();
    var creditoD1 = $("#creditoD1").val();
    var creditoD2 = $("#creditoD2").val();
    var creditoD3 = $("#creditoD3").val();
    $(".section").append("<div class='text-center'><div class='spinner-border text-primary' role='status'><span class='sr-only'>Loading...</span></div></div>");
    $.ajax({
      method: "POST",
      url: "ListaTipoCredito.php",
      data: {
        corriente : corriente,
        creditoP0 : creditoP0,
        creditoP1 : creditoP1,
        creditoP2 : creditoP2,
        creditoP3 : creditoP3,
        creditoD0 : creditoD0,
        creditoD1 : creditoD1,
        creditoD2 : creditoD2,
        creditoD3 : creditoD3
      },
      success: function(result) {
        console.log(result);
        $( ".section" ).empty();
        $(".section").append("<p class='card-text'>" + result + "</p>");
        $("html, body").animate({
        scrollTop: 0
        }, 500);
      }
    });
}

function validate(input){
    if(/[^0-9,]/.test(input.value))input.value = input.value.replace(/[^0-9,]/g,'');
}
