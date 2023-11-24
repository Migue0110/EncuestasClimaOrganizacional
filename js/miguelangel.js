$(function () {
    tablaTableros = $("#informe_tema").DataTable({
      initComplete: function () {
        this.api().columns().every(function () {
          let column = this;
          let title = $(column.header()).text();
  
          // Create input element
          let input = document.createElement('input');
          input.placeholder = 'Filtrar ' + title;
          $(input).appendTo($(column.header()))
            .on('keyup change', function () {
              if (column.search() !== this.value) {
                column.search(this.value).draw();
              }
            });
        });
      },
      dom: "lBfrtip",
      buttons: [ "excel", "pdf"],
      //   "scrollX": true,
      // "fixedColumns": {
      //   "rightColumns": 1
      // },
      ajax: {
        url: "../modulos/informes/informes.php",
        method: "POST",
        data: { action: "informeTema" },
        dataSrc: "",
        dataType: "json",
      },
      columns: [
  
          { data: "nombre_tema" },
          { data: "encuesta" },
          { data: "nombre_completo" },
          { data: "nombre_area" },
          { data: "nombre_cargo" },
          { data: "pregunta" },
          { data: "respuesta" },
      ],
  
      language: {
        lengthMenu: "Mostrar _MENU_ registros",
        zeroRecords: "No se encontraron resultados",
        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
        infoFiltered: "(filtrado de un total de _MAX_ registros)",
        sSearch: "Buscar:",
        oPaginate: {
          sFirst: "<i class='fa fa-regular fa-arrow-right-to-line'></i> Primero",
          sLast: "Último <i class='fa fa-regular fa-arrow-left-to-line'></i>",
          sNext: "Siguiente <i class='fa-solid fa-arrow-right'></i>",
          sPrevious: "<i class='fa fa-solid fa-arrow-left'></i> Anterior",
        },
        sProcessing: "Procesando...",
      },
      scrollX: true, // Habilitar el scroll horizontal
      scrollY: "400px", // Altura del área de scroll vertical
      scrollCollapse: true, // Colapsar la altura del área de scroll vertical
      paging: true, // Mostrar paginación
      pageLength: 20 // Número de filas por página
    });
  
})