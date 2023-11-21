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

        // Configuración del gráfico de Compromiso (miguel.js)
        var compromisoConfig = {
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

        // Configuración del gráfico de Datos (miguel.js)
        var datosConfig = {
            type: 'polarArea',
            data: {
                labels: etiquetas,
                datasets: [{
                    label: 'Datos',
                    data: datosDepartamentoA, // Puedes cambiar a datosDepartamentoB si lo prefieres
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    r: {
                        pointLabels: {
                            display: true,
                            centerPointLabels: true,
                            font: {
                                size: 18
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Polar Area Chart With Centered Point Labels'
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
        var ctxDatos = document.getElementById('datosChart').getContext('2d');
        var datosChart = new Chart(ctxDatos, datosConfig);