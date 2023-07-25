<!DOCTYPE html>
<html>

  <head>
    <title>Fear and Greed Index</title>
  </head>

  <body class="bg-[#0C1116] text-white flex flex-col items-center justify-center h-screen m-0 p-0 box-border">
    <h1 class="text-2xl">Fear and Greed Index</h1>
    <div id="index" class="text-2xl mt-8">Loading...</div>
    <div id="bar" class="w-full h-12 bg-gradient-to-r from-red-800 via-white to-green-800 relative mt-4 rounded">
      <div id="marker" class="absolute top-0 h-full w-0.5 bg-black"></div>
    </div>

    <script>
      fetch('https://api.alternative.me/fng/?limit=1')
            .then(response => response.json())
            .then(data => {
                const index = data.data[0].value;
                const classification = data.data[0].value_classification;
                document.getElementById('index').textContent = `Index: ${index}/100`;
                document.getElementById('marker').style.left = `${index}%`;
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('index').textContent = 'Failed to load index';
            });
    </script>
  </body>

</html>