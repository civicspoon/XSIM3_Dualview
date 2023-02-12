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
<div class="row justify-content-center">
            <center><div id="keyboard"></div></center>
        </div>

</body>

<script>

const SCREEN_HEIGHT = screen.height
const SCREEN_WIDTH = screen.width
const CANVAS_HEIGHT = window.innerHeight-200
const CANVAS_WIDTH = (window.innerWidth /2)-10
let imgA = []
let imgB = []
let i = 0
let score = 0
let img_count = 1
 let x1 = new Image 
    x1.src = 'xsim_keyboard.png'
    let S1 = new Image();

class _canvas{
    constructor(domId){
        this.domId = domId
        this.canvas = document.createElement('canvas')
        this.ctx =this.canvas.getContext("2d")             
    }
    
    start(w,h){        
        this.canvas.style.backgroundColor = "white"
        this.canvas.setAttribute('width',w)
        this.canvas.setAttribute('height',h)
        this.domTaget = document.getElementById(this.domId)
        this.domTaget.appendChild(this.canvas);   
    }
    drawimg(img,x,y,w,h){
        let images = new Image();
        images.src =  img
        this.ctx.drawImage(images,x,y)
        return true
        
    }
    clear_screen(){
        this.ctx.fillStyle = 'white'
        this.ctx.fillRect(0,0,CANVAS_WIDTH,CANVAS_HEIGHT)
        
        
    }
}
const keyboard = new _canvas("keyboard")

window.onload =   ()=>{
  console.log("start")

    const kb =  keyboard.start(window.innerWidth,150) /// Div To canvas
   // keyboard.ctx.drawImage(x1,0,0,window.innerWidth,150) // Draw Img

    //keyboard.ctx.drawImage(x1, dx, dy);
    //keyboard.ctx.drawImage(x1, dx, dy, dWidth, dHeight);
    keyboard.ctx.drawImage(x1, 10, 50, 100, 70, 0,0,100,70);
    
}
</script>
</html>
