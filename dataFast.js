function postCredito (){
var corriente = $("corriente").val();
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
    var resultado = result;
    alert(resultado);
    var yison = JSON.parse(resultado);
    console.log(yison);
    if (yison.status.status == "FAILED") {
      console.log("es fallido ");
      $( ".section" ).empty();
      alert(yison.status.message);
    } else {
      $( ".section" ).empty();
      console.log(yison.credits);
      for (var i = 0; i < yison.credits.length; i++) {
        //tipo de credito
        console.log(yison.credits[i].description);
        var liscredito = yison.credits[i];
        $(".section").append("<h5>" + yison.credits[i].description + "</h5>");
        //console.log(liscredito);
        for (var e = 0; e < liscredito.installments.length; e++) {
          console.log(liscredito.installments[e]);
          $(".section").append("<p>" + liscredito.installments[e] + "</p>");
        }
      }
    }
  }
});

}
