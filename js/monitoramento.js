function atualizarCartoes() {
  $.ajax({
    url: "http://localhost:8000/lib/atualizar.php",
    type: "GET",
    success: function() {
      $.ajax({
        url: "http://localhost:8000/lib/ramais-api.php",
        type: "GET",
        success: function(data) {
          $('#cartoes').empty();

          for (let i in data) {
            const classeCartao = data[i].status === 'indisponivel' ? 'cartao cartao-indisponivel' : 'cartao';
            $('#cartoes').append(`
              <div class="${classeCartao}">
                <div>${data[i].nome} (${data[i].nome_agente ?? ''})</div>
                <span class="${data[i].status} icone-posicao"></span>
              </div>`);
          }
        },
        error: function(jqXHR) {
            $('#cartoes').html(`<div class="cartao cartao-erro">
                Erro ao carregar os ramais.
            </div>`);

            console.log("Erro AJAX:", jqXHR.responseText);
        }
      });
    },
        error: function(jqXHR) {
            $('#cartoes').html(`<div class="cartao cartao-erro">
                Erro ao atualizar banco de dados.
            </div>`);

            console.log("Erro AJAX:", jqXHR.responseText);
        }
  });
}

atualizarCartoes();

setInterval(atualizarCartoes, 10000);