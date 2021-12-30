// mascara de cep
$('.zip_code').mask('00000-000');

// automatização de funções do sweet alert 2
function showError(text = "Ocorreu um erro!")
{

    let message = '';
    
    if (typeof text == 'string'){
        
        Swal.fire({ type: 'error', html: text, showConfirmButton: true })

    }else{

        for (const e in text) {
            message += '<i class="fa fa-angle-right text-secondary"></i> ' + text[e] + '<br>'
        }
    
        Swal.fire({ type: 'error', html: message, showConfirmButton: true })

    }

}

function showSuccess(title = null, text = null, functions = null, param = null)
{
    if(functions){
        if(title && text == null)
            Swal.fire({ type: 'success', title: title, showConfirmButton: false, timer: 1000, onClose: () => { functions(param); } })
        else if(title && text)
            Swal.fire({ type: 'success', title: title, text: text, showConfirmButton: false, timer: 1000, onClose: () => { functions(param); } })
    }else{
        if(title && text == null)
            Swal.fire({ type: 'success', title: title, showConfirmButton: false, timer: 1000 })
        else if(title && text)
            Swal.fire({ type: 'success', title: title, text: text, showConfirmButton: false, timer: 1000 })
    }

}

// BUSCA DE ENDEREÇO
$("#zipCode").on("keyup", function(){

    if($(this).val().length == 9){

        let zip_code = $(this).val();
        let zip_code_format = zip_code.replace("-","");

        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.get(`http://viacep.com.br/ws/${zip_code_format}/json`, { })
                        .then(function (data) {

                            if(data.erro){
                                showError(`Cep <strong>${zip_code}</strong> não encontrado!`)
                                $("#zipCode").val("")
                                return false;
                            }

                            $(".zipCodeResp").show()
                            $(".zipCodeResp").html(`${data.uf} - ${data.localidade}`)

                            Swal.close();

                        })
                        .catch();
                },
            },
        ]);
    }else{
        $(".zipCodeResp").hide()
    }
})