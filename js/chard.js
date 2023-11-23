



// Obtén el contexto del canvas
var ctx = document.getElementById('polarChart').getContext('2d');

// Datos para el gráfico (aquí puedes ajustar según tus necesidades)
var data = {
  datasets: [{
      data: [5, 10, 15, 7, 2], // Datos para los puntos en el gráfico
      backgroundColor: [
          'rgba(255, 99, 132, 0.2)', // Color de fondo para el primer punto
          'rgba(54, 162, 235, 0.2)', // Color de fondo para el segundo punto
          'rgba(255, 206, 86, 0.2)', // Color de fondo para el tercer punto
          'rgba(75, 192, 192, 0.2)', // Color de fondo para el cuarto punto
          'rgba(153, 102, 255, 0.2)' // Color de fondo para el quinto punto
      ],
      borderColor: [
          'rgba(255, 99, 132, 1)', // Color del borde para el primer punto
          'rgba(54, 162, 235, 1)', // Color del borde para el segundo punto
          'rgba(255, 206, 86, 1)', // Color del borde para el tercer punto
          'rgba(75, 192, 192, 1)', // Color del borde para el cuarto punto
          'rgba(153, 102, 255, 1)' // Color del borde para el quinto punto
      ],
      borderWidth: 1 // Ancho del borde del gráfico
  }],
  labels: ['Dato 1', 'Dato 2', 'Dato 3', 'Dato 4', 'Dato 5'] // Etiquetas para cada punto
};

// Opciones del gráfico (puedes ajustar según tus necesidades)
var options = {
    scale: {
        angleLines: {
            display: true
        },
        ticks: {
            suggestedMin: 0,
            suggestedMax: 20
        }
    }
};

// Crea el gráfico polar
var polarChart = new Chart(ctx, {
    type: 'polarArea', // Tipo de gráfico polar
    data: data,
    options: options
});
