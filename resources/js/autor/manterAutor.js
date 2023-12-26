$(function () {
    $('form').on('submit', function (e) {
      e.preventDefault();

      var manter = $("#manter").val();
      if(manter == 'Cadastrar') {
        var url = "/api/autor/create";
        var type = "POST";
      } else {
        var url = "/api/autor/update";
        var type = "PUT";
      }

      $.ajax({
        url: url,
        type: type,
        data: $("form").serialize()
      }).done(function (resposta) {
          if(resposta.Nome != ""){
              toastr.success('Registro efetuado com sucesso!', 'Autor - '+manter, { timeOut: 6000 });
              $("#Nome").val("");

              $("#Nome").removeClass("is-invalid");
              $("#Nome-error").text("");
              $("#Nome-error").hide();
          }
      }).fail(function (xhr, textStatus) {
          if(textStatus == 'error'){
              var json = $.parseJSON(xhr.responseText);

              $("#Nome").addClass( "is-invalid" );
              $("#Nome-error").text(json.error.message.Nome);
              $("#Nome-error").show();

              toastr.error('Erro ao tentar Salvar o registro.', 'Autor', { timeOut: 6000 });
          }
          return false;
      });
    });
});
