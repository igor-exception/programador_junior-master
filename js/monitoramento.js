$.ajax({
    url: "http://localhost:8000/lib/ramais.php",
    type: "GET",
    success: function(data){                
        for(let i in data){
            if(data[i].status == 'indisponivel') {
                $('#cartoes').append(`<div class="cartao cartao-indisponivel">
                    <div>${data[i].nome}(${data[i].nome_agente})</div>
                    <span class="${data[i].status} icone-posicao"></span>
                </div>`)
            } else {
                $('#cartoes').append(`<div class="cartao">
                    <div>${data[i].nome}(${data[i].nome_agente})</div>
                    <span class="${data[i].status} icone-posicao"></span>
                </div>`)
            }
        }
    },
    error: function(){
        console.log("Errouu!")
    }
});