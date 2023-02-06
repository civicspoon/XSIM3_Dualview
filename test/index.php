<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    
<h1>The Window Object</h1>
<h2>The setTimeout() Method</h2>

<p>Wait 5 seconds for the greeting:</p>

<h2 id="demo"></h2>

<script>
async function loadNames() {
  const response = await fetch('../api/user.php');
  console.log("start")
  const names = await response.json();
  console.log(names); 
  console.log("end")
  // logs [{ name: 'Joker'}, { name: 'Batman' }]
}
loadNames();


// const getuser = () => {
//   return new Promise(resolve => 
//   {
//     let data = fetch('../api/user.php');
//     return data
//   });
// }

// const sample = async () => {
//   console.log('a');
//   console.log('waiting...')
//   let delayres = await console.log((getuser()));
//   console.log('b');
// }
// sample();
</script>

</body>
</html>
