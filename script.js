document.addEventListener("DOMContentLoaded", function () {
  const FormSesion = document.getElementById("FormSesion");

  btnSesion.addEventListener("click", function () {
    FormSesion.style.display = "block";
  });

  var btnEliminarElements = document.getElementsByClassName("btnEliminar");
  for (var i = 0; i < btnEliminarElements.length; i++) {
      btnEliminarElements[i].addEventListener("click", function () {
          var rowId = this.getAttribute("data-id");
          eliminarRegistro(rowId);
      });
  }

  $("#FormSesion").submit(function (event) {
    event.preventDefault();

    var nombre = $("#nombre").val();
    var correo = $("#correo").val();
    var contrasena = $("#contrasena").val();
    var tarea = $("#tarea").val();

    $.ajax({
      type: "POST",
      url: "crud.php",
      data: {
        action: "create",
        nombre: nombre,
        correo: correo,
        contrasena: contrasena,
        tarea: tarea,
      },
      success: function (response) {
        $("#mensaje").html(response);
        $("#mensaje").show();
        setTimeout(function () {
          $("#mensaje").hide();
          location.reload();
        }, 2000);
      },
  });
});

  function eliminarRegistro(id) {
    $.ajax({
        type: "POST",
        url: "crud.php",
        data: {
            action: "delete",
            id: id
        },
       success: function (response) {
        
        $("#mensaje").html(response);
        location.reload();
      },
      
    });
}
});
