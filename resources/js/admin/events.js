$("#addUserForm").on('submit', (event) => {
    event.preventDefault();

    let data = $("#addUserForm").serialize();
    $.post('/cadastrar', data, (response) => {
        if (response == 1) {
            console.log(response);
            $("#msg").html('<div class="alert alert-success" role="alert">Cliente Cadastrado com Sucesso!</div>')
        } else {
            $("#msg").html('<div class="alert alert-danger" role="alert">Erro ao Cadastrar Cliente!</div>')
        }
        $("#addUserModal").modal('hide');
        $("#addUserForm")[0].reset();
        //limpa campo antes de atualizar
        $("#customers").html('');
        getData();
    })
})

function getData() {
    $.ajax(({
        type: "GET",
        url: '/clta',
        success: (data) => {
            $("#customer-data").html(data);
        }
    }))
}
