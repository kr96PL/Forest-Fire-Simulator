async function fetchData() {
    fetch('./app.php')
    .then(res => res.json())
    .then(data => {
        const thunder = data.thunder;
        const aliveTrees = data.aliveTrees;
        const burnedTrees = data.burnedTrees;

        console.log(thunder, aliveTrees, burnedTrees)
    })
}

fetchData();

const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});