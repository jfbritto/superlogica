$(document).ready(function () {

    const tabela = $('#table').DataTable({
        "paging":   true,
        "ordering": true,
        "order": [],
        "info":     true,
        "searching":true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
        },
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );

    loadUsers();

    // LISTAR ALUNOS
    function loadUsers()
    {
        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.get(window.location.origin + "/api/user", {

                    })
                    .then(function (data) {
                        if (data.status == "success") {

                            Swal.close();
                            $("#list").html(``);

                            tabela.clear().draw();
    
                            if(data.data.length > 0){

                                data.data.forEach(item => {

                                    tabela.row.add( [
                                        item.name,
                                        item.userName,
                                        item.email,
                                        item.zipCode,
                                        `<a title="Deletar" href="#" data-id="${item.id}" class="btn btn-danger btn-sm delete-user"><i class="fas fa-trash-alt"></i></a>`
                                    ]).draw();

                                });
                            }


                        } else if (data.status == "error") {
                            showError(data.message)
                        }
                    })
                    .catch();
                },
            },
        ]);
    }

    // CADASTRAR USUÁRIO
    $("#formStoreUser").submit(function (e) {
        e.preventDefault();

        if (!validatorPass()) {
            showError("Preencha a senha corretamente!")
            return false;
        }

        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.post(window.location.origin + "/api/user", {
                        name: $("#name").val(),
                        userName: $("#userName").val(),
                        zipCode: $("#zipCode").val(),
                        email: $("#email").val(),
                        password: $("#password").val(),
                    })
                    .then(function (data) {
                        if (data.status == "success") {

                            $("#formStoreUser").each(function () {
                                this.reset();
                            });
                            
                            $("#list-errors").html("")
                            $(".zipCodeResp").hide()

                            showSuccess("Cadastro efetuado!", null, loadUsers)
                        } else if (data.status == "error") {
                            showError(data.message)
                        }
                    })
                    .catch(function (data) {
                        showError(data.responseJSON.errors)
                    });
                },
            },
        ]);
    });

    // DELETAR USUÁRIO
    $("#list").on("click", ".delete-user", function(){
        
        let id = $(this).data('id');

        Swal.fire({
            title: 'Atenção!',
            text: "Deseja realmente deletar o usuário?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Sim',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Não'
            }).then((result) => {
                if (result.value) {

                    Swal.queue([
                        {
                            title: "Carregando...",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            onOpen: () => {
                                Swal.showLoading();
                                $.ajax({
                                    url: window.location.origin + "/api/user",
                                    type: 'DELETE',
                                    data: {id}
                                })
                                .then(function (data) {
                                    if (data.status == "success") {
                                                    
                                        showSuccess("Deletado com sucesso!", null, loadUsers)
                                    } else if (data.status == "error") {
                                        showError(data.message)
                                    }
                                })
                                .catch(function (data) {
                                    showError(data.responseJSON.errors)
                                });
                            },
                        },
                    ]);

                }
            })

    });


    $("#password").on("keyup", function(){

        validatorPass()
    })

    function validatorPass()
    {
        let pass = $("#password").val()
        response = true

        $("#list-errors").html("")

        var matches_let = pass.match(/[a-zA-Z]/g);
        if (matches_let != null){
            $("#list-errors").append(`<li>Pelo menos 1 letra &nbsp; <i class="fas fa-check-circle" style="color: #28a745;"></i></li>`)
        }else{
            $("#list-errors").append(`<li>Pelo menos 1 letra &nbsp; <i class="fas fa-check-circle" style="color: #dc3545;"></i></li>`)
            response = false
        }

        var matches_num = pass.match(/\d+/g);
        if (matches_num != null){
            $("#list-errors").append(`<li>Pelo menos 1 número &nbsp; <i class="fas fa-check-circle" style="color: #28a745;"></i></li>`)
        }else{
            $("#list-errors").append(`<li>Pelo menos 1 número &nbsp; <i class="fas fa-check-circle" style="color: #dc3545;"></i></li>`)
            response = false
        }

        if (pass.length >= 8){
            $("#list-errors").append(`<li>8 ou mais caracteres &nbsp; <i class="fas fa-check-circle" style="color: #28a745;"></i></li>`)
        }else{
            $("#list-errors").append(`<li>8 ou mais caracteres &nbsp; <i class="fas fa-check-circle" style="color: #dc3545;"></i></li>`)
            response = false
        }

        return response
    }


});