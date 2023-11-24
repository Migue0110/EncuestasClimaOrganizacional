$(function () {
    $.ajax({
        url: "../modulos/informes/consultas.php",
        type: "POST",
        dataType: "json",
        data: { action: 'porArea' },
    }).done((response) => {
        if (response.hasOwnProperty('error')) {
            alert(response.error);
        } else {
            const datos = {
                labels: response.map(item => item.nombre_area),
                datasets: [{
                    label: 'Cantidad de Empleados por Área',
                    data: response.map(item => item.cantidad_empleados),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        // Agrega más colores según sea necesario
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        // Agrega más colores según sea necesario
                    ],
                    borderWidth: 1
                }]
            };

            const ctx = document.getElementById('areaChart').getContext('2d');

            const myChart = new Chart(ctx, {
                type: 'bar',
                data: datos,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }).fail((error) => {
        console.log(error);
    });




    $.ajax({
        url: "../modulos/informes/consultas.php",
        type: "POST",
        dataType: "json",
        data: { action: 'AreaAmbiente' },
    }).done((response) => {
        if (response.hasOwnProperty('error')) {
            alert(response.error);
        } else {


            const polarChartData = {
                labels: response.map(item => `${item.nombre_tema} - Respuesta ${item.respuesta}`),
                datasets: [{
                    label: 'Escala de Ambiente',
                    data: response.map(item => item.cantidad_empleados),
                    backgroundColor: [
                        'rgba(216, 219, 226, 0.2)',
                        'rgba(169, 188, 208,  0.2)',
                        'rgba(88, 164, 176,  0.2)',
                        'rgba(55, 63, 81,  0.2)',
                        'rgba(218, 164, 154,  0.2)',
                        'rgba(255, 0, 110,  0.2)',
                        // Agrega más colores según sea necesario
                    ],
                    borderColor: [
                        'rgba(216, 219, 226, 0.8)',
                        'rgba(169, 188, 208, 0.8)',
                        'rgba(88, 164, 176, 0.8)',
                        'rgba(55, 63, 81, 0.8)',
                        'rgba(218, 164, 154, 0.8)',
                        'rgba(255, 0, 110, 0.8)',
                        // Agrega más colores según sea necesario
                    ],
                    borderWidth: 1
                }]
            };

            const ctxPolar = document.getElementById('ambienteChart').getContext('2d');

    
            const polarChart = new Chart(ctxPolar, {
                type: 'polarArea',
                data: polarChartData
            });
        }
    }).fail((error) => {
        console.log(error);
    });
});

// Obtén el contexto del canvas
// var ctx = document.getElementById('polarChart').getContext('2d');

// // Datos para el gráfico (aquí puedes ajustar según tus necesidades)
// var data = {
//   datasets: [{
//       data: [5, 10, 15, 7, 2], // Datos para los puntos en el gráfico
//       backgroundColor: [
//           'rgba(255, 99, 132, 0.2)', // Color de fondo para el primer punto
//           'rgba(54, 162, 235, 0.2)', // Color de fondo para el segundo punto
//           'rgba(255, 206, 86, 0.2)', // Color de fondo para el tercer punto
//           'rgba(75, 192, 192, 0.2)', // Color de fondo para el cuarto punto
//           'rgba(153, 102, 255, 0.2)' // Color de fondo para el quinto punto
//       ],
//       borderColor: [
//           'rgba(255, 99, 132, 1)', // Color del borde para el primer punto
//           'rgba(54, 162, 235, 1)', // Color del borde para el segundo punto
//           'rgba(255, 206, 86, 1)', // Color del borde para el tercer punto
//           'rgba(75, 192, 192, 1)', // Color del borde para el cuarto punto
//           'rgba(153, 102, 255, 1)' // Color del borde para el quinto punto
//       ],
//       borderWidth: 1 // Ancho del borde del gráfico
//   }],
//   labels: ['Dato 1', 'Dato 2', 'Dato 3', 'Dato 4', 'Dato 5'] // Etiquetas para cada punto
// };

// // Opciones del gráfico (puedes ajustar según tus necesidades)
// var options = {
//     scale: {
//         angleLines: {
//             display: true
//         },
//         ticks: {
//             suggestedMin: 0,
//             suggestedMax: 20
//         }
//     }
// };

// // Crea el gráfico polar
// var polarChart = new Chart(ctx, {
//     type: 'polarArea', // Tipo de gráfico polar
//     data: data,
//     options: options
// });


//         // Datos de ejemplo (miguel.js)
//         var datosDepartamentoA = [75, 80, 90, 85];
//         var datosDepartamentoB = [60, 70, 75, 80];
//         var etiquetas = ['Trimestre 1', 'Trimestre 2', 'Trimestre 3', 'Trimestre 4'];

//         // Configuración del gráfico de Satisfacción del Empleado (miguel.js)
//         var satisfaccionConfig = {
//             type: 'bar',
//             data: {
//                 labels: etiquetas,
//                 datasets: [{
//                     label: 'Departamento A',
//                     backgroundColor: 'rgba(75, 192, 192, 0.2)',
//                     borderColor: 'rgba(75, 192, 192, 1)',
//                     borderWidth: 1,
//                     data: datosDepartamentoA
//                 },
//              {
//                 labels: 'Departamento B',
//                     backgroundColor: 'rgba(255, 99, 132, 0.2)',
//                     borderColor: 'rgba(255, 99, 132, 1)',
//                     borderWidth: 1,
//                     data: datosDepartamentoB
//                 }]
//             },
//             options: {
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 }
//             }
//         };

//         var compromisoConfig= {
//             type: 'bar',
//             data: {
//                 labels: etiquetas,
//                 datasets: [{
//                     label: 'Departamento A',
//                     backgroundColor: 'rgba(75, 192, 192, 0.2)',
//                     borderColor: 'rgba(75, 192, 192, 1)',
//                     borderWidth: 1,
//                     data: datosDepartamentoA
//                 },
//              {
//                 labels: 'Departamento B',
//                     backgroundColor: 'rgba(255, 99, 132, 0.2)',
//                     borderColor: 'rgba(255, 99, 132, 1)',
//                     borderWidth: 1,
//                     data: datosDepartamentoB
//                 }]
//             },
//             options: {
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 }
//             }
//         };

         

    

//         // Inicializar gráfico de Satisfacción del Empleado (miguel.js)
//         var ctxSatisfaccion = document.getElementById('satisfaccionChart').getContext('2d');
//         var satisfaccionChart = new Chart(ctxSatisfaccion, satisfaccionConfig);

//         // Inicializar gráfico de Compromiso (miguel.js)
//         var ctxCompromiso = document.getElementById('compromisoChar').getContext('2d');
//         var compromisoChart = new Chart(ctxCompromiso, compromisoConfig);

//         // Inicializar gráfico de Datos (miguel.js)
