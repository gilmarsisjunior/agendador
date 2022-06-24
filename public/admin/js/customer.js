/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/admin/customer.js ***!
  \****************************************/
//add customers;
$("#addUserForm").on('submit', function (event) {
  event.preventDefault();
  var data = $("#addUserForm").serialize();
  $.post('/cadastrar', data, function (response) {
    if (response == 1) {
      console.log(response);
      $("#msg").html('<div class="alert alert-success" role="alert">Cliente Cadastrado com Sucesso!</div>');
    } else {
      $("#msg").html('<div class="alert alert-danger" role="alert">Erro ao Cadastrar Cliente!</div>');
    }

    $("#addUserModal").modal('hide');
    $("#addUserForm")[0].reset(); //limpa campo antes de atualizar

    $("#customers").html('');
    getData();
  });
});

function getData() {
  $.ajax({
    type: "GET",
    url: '/clta',
    success: function success(data) {
      $("#customer-data").html(data);
    }
  });
}
/******/ })()
;