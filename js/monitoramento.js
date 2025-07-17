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
            const hoje = new Date().toISOString().split('T')[0];
            $('#cartoes').append(`
              <a href="/lib/detalhe.php?agente=${encodeURIComponent(data[i].nome_agente)}&inicio=${hoje}&fim=${hoje}" target="_blank" class="cartao-link">
                <div class="${classeCartao}">
                  <div>${data[i].nome} (${data[i].nome_agente ?? ''})</div>
                  <span class="${data[i].status} icone-posicao" data-toggle="tooltip" title="${data[i].status}"></span>
                </div>
              </a>
            `);
          }

          // Ativa tooltips com Popper.js via Bootstrap
          $('[data-toggle="tooltip"]').tooltip();

          // Contar status
          const contagemStatus = {};
          const listaRamais = Object.values(data);

          listaRamais.forEach(ramal => {
            contagemStatus[ramal.status] = (contagemStatus[ramal.status] || 0) + 1;
          });

          // Preencher tabela
          const $tabela = $('#tabela-status tbody');
          $tabela.empty();

          for (const status in contagemStatus) {
            $tabela.append(`
              <tr>
                <td>${status}</td>
                <td>${contagemStatus[status]}</td>
              </tr>
            `);
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

$('#filtro').on('input', function () {
  const termo = $(this).val().toLowerCase();
  $('.cartao').each(function () {
    const texto = $(this).text().toLowerCase();
    $(this).toggle(texto.includes(termo));
  });
});

atualizarCartoes();

setInterval(atualizarCartoes, 10000);
