fetch('blooklet.json')
  .then(response => response.json())
  .then(data => console.log(data));
