document.addEventListener('DOMContentLoaded', function() {
    fetch('results.php')
        .then(response => response.json())
        .then(data => {
            let resultsDiv = document.getElementById('results');
            for (let candidate in data) {
                let result = document.createElement('p');
                result.textContent = candidate + ': ' + data[candidate] + ' votes';
                resultsDiv.appendChild(result);
            }
        });
});
