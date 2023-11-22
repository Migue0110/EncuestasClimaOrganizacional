        // Datos de ejemplo (miguel.js)
        var datosDepartamentoA = [75, 80, 90, 85];
        var datosDepartamentoB = [60, 70, 75, 80];
        var etiquetas = ['Trimestre 1', 'Trimestre 2', 'Trimestre 3', 'Trimestre 4'];

        // Configuración del gráfico de Satisfacción del Empleado (miguel.js)
        var satisfaccionConfig = {
            type: 'bar',
            data: {
                labels: etiquetas,
                datasets: [{
                    label: 'Departamento A',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: datosDepartamentoA
                }, {
                    label: 'Departamento B',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    data: datosDepartamentoB
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

    

        // Inicializar gráfico de Satisfacción del Empleado (miguel.js)
        var ctxSatisfaccion = document.getElementById('satisfaccionChart').getContext('2d');
        var satisfaccionChart = new Chart(ctxSatisfaccion, satisfaccionConfig);

        // Inicializar gráfico de Compromiso (miguel.js)
        var ctxCompromiso = document.getElementById('compromisoChart').getContext('2d');
        var compromisoChart = new Chart(ctxCompromiso, compromisoConfig);

        // Inicializar gráfico de Datos (miguel.js)
