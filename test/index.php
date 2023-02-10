<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>
<body>
    
<h1>The Window Object</h1>
<h2>The setTimeout() Method</h2>

<p>Wait 5 seconds for the greeting:</p>

<h2 id="demo"></h2>

<script>

let imgA = []
let imgB = []
function preloadimg(data){
    for(let x in data){
      imgA[x] = new Image()
      imgA[x].src = '../frontend/cbt/img/'+data[x].side1
      imgB[x] = new Image()
      imgB[x].src = '../frontend/cbt/img/'+data[x].side2
    console.log(data[x].side1+" / "+data[x].side2)
    console.log(imgB[x].src)
    }


}

async function load(){
    console.log("Start")
    console.log("Loading")
    const loaddata = await fetch('../api/xrayimagload.php')
    const text = await loaddata.text();
    let js = JSON.parse(text)
  const preload = preloadimg(js)
  console.log("Finish")
}
load()
</script>

</body>
</html>
