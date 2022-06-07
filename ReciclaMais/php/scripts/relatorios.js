var ctx = document.getElementById('grafico-venda');

var quantidade = [135850, 52122, 148825, 16939, 9763];
var materias = ['Cobre', 'Papel', 'Aluminio', 'Pet', 'Ferro'];

var myChart = new Chart(ctx, {
 type: 'pie',
 data: {
    labels: materias,
    datasets: [{
        label: 'quantidade',
        data: quantidade,
        backgroundColor: [
            "#B4E197",
            "#83BD75",
            "#3f7740",
            "#4E944F",
            "#598b4c"
            ]
    }]
 },
})
