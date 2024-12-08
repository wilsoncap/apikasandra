const data = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
        {
            label: 'Dataset 1 (default draw time)',
            data: [0, 20, 40, 50, 30, 70, 90],
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderWidth: 2,
        },
        {
            label: 'Dataset 2 (drawTime: afterDatasetsDraw)',
            data: [90, 70, 50, 40, 60, 30, 10],
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderWidth: 2,
            drawTime: 'afterDatasetsDraw' // Configuración específica del drawTime
        },
        {
            label: 'Dataset 3 (drawTime: beforeDatasetsDraw)',
            data: [30, 50, 10, 90, 20, 80, 40],
            borderColor: 'rgba(255, 206, 86, 1)',
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderWidth: 2,
            drawTime: 'beforeDatasetsDraw' // Configuración específica del drawTime
        }
    ]
};

// Configuración del gráfico
const config = {
    type: 'line', // Tipo de gráfico: línea
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Line Chart with DrawTime'
            }
        },
        // Configuración global para drawTime
        datasets: {
            drawActiveElementsOnTop: true,
        }
    }
};


export { config };