const SCREEN_HEIGHT = screen.height
const SCREEN_WIDTH = screen.width
const CANVAS_HEIGHT = window.innerHeight-200
const CANVAS_WIDTH = (window.innerWidth /2)-10
let imgA = []
let imgB = []
let i = 0

 let x1 = new Image 
    x1.src = 'src/xsim_keyboard.png'
    let S1 = new Image();
  //  S1.src= 'img/BAGGAGE_1-1.jpg'

    let S2 = new Image();
 //   S2.src= 'img/BAGGAGE_1-2.jpg'
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

class SoftBTN {
  constructor(name,top_x,top_y,bottom_x,bottom_y){
    this.name = name
    this.top_x=top_x
    this.top_y=top_y
    this.bottom_x=bottom_x
    this.bottom_y=bottom_y
  }
  click(){
    kb.ctx.fillStyle = "rgba(200, 0, 0, 0.5)"
    kb.ctx.ctx.fillRect(this.top_x, this.top_y, this.bottom_x, this.bottom_y);
  }

}





const lcd_screen = new _canvas("screen_canvas")
const lcd_screen2 = new _canvas("screen2_canvas")
const keyboard = new _canvas("keyboard")
let x_pos=0 
let y_pos = 0
let scale_ratio =0
//////////////////////





///////////////////////////////////////////////////////  Timer section
function myTimer() {
 x_pos +=2
//  console.log(x_pos)

 lcd_screen.clear_screen()
 drawXray(lcd_screen,S1)
lcd_screen2.clear_screen()
 drawXray(lcd_screen2,S2)

}




///////////////////  Window Start
let clock = setInterval(myTimer, 30);
window.onload =  async function(){
   load()
  console.log("start")
    const l1 =  lcd_screen.start(CANVAS_WIDTH,CANVAS_HEIGHT)
    const l2 =  lcd_screen2.start(CANVAS_WIDTH,CANVAS_HEIGHT)
    const kb =  keyboard.start(window.innerWidth,150)
    //S1 = new Image()

    drawXray(lcd_screen, S1)
    drawXray(lcd_screen2,S2)

    keyboard.ctx.drawImage(x1,0,0,window.innerWidth,150)
    console.log(window.innerWidth)
    let x = 0   


/////// KEY Binding
    document.addEventListener('keydown', function(e) {
       // if(event.key == "a") {
           console.log(e.key);
      //  }
      if(e.key=='ArrowUp'){
        console.log("Up")
        y_pos +=10
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      if(e.key=='ArrowDown'){
        console.log("Down")
        y_pos -=10
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      if(e.key=='ArrowLeft'){
        console.log("Left")
        x_pos -=10
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      if(e.key=='ArrowRight'){
        console.log("Right")
        x_pos +=10
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      if(e.key==' '){
        console.log("Space")
        ansModal.show()
        pause()
      }
      if(e.key=='PageUp'){
        scale_ratio +=50
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
        console.log("Space")
      }
      if(e.key=='PageDown'){
        scale_ratio -=50
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
        console.log("Space")
      }

      /// P1
      if(e.key=='1'){
        invert()
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      /// P2
      if(e.key=='2'){
        grayscale()
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      /// P3
      if(e.key=='3'){
        resetfilter()
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      // pause
      if(e.key=='w'){
        pause()
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }

    // backward
    if(e.key=='q'){
        clearInterval(clock)
        pause_status = 1
        x_pos -=10
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)

    }
    // forward
    if(e.key=='e'){
        clearInterval(clock)
        pause_status = 1
        x_pos +=10
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)

    }


     }, false)

     

}
////////////////////////////////////

//////////////////////////// Xray img  Load

function drawXray(screen,img){
    
    let Mid_Y =(CANVAS_HEIGHT/2) -  (img.height/2) 
    let xx = x_pos-img.width

    screen.ctx.drawImage(img,xx,Mid_Y-y_pos, img.width+scale_ratio,img.height+scale_ratio)
    if (xx >= CANVAS_WIDTH){
      console.log(imgA[i])
      console.log(imgB[i])
      x_pos = 0
      y_pos = 0
      scale_ratio =0
        i++
        S1.src = imgA[i]
        S2.src = imgB[i]
        if(i>=imgA.length){
          clearInterval(clock)
          alert("End Session")
        }
    }


}


function invert(){
        lcd_screen.ctx.filter = 'invert(100%)'//update_canvas();
        lcd_screen2.ctx.filter = 'invert(100%)'//update_canvas();      
      
    }

    function grayscale(){
        lcd_screen.ctx.filter = 'grayscale(100%)'
        lcd_screen2.ctx.filter = 'grayscale(100%)'
        }
 
    function resetfilter(){
        lcd_screen.ctx.filter = 'grayscale(0%)'
        lcd_screen2.ctx.filter = 'grayscale(0%)'
    }

    let pause_status = 0
    function pause(){
        if(pause_status==0){
            clearInterval(clock)
            pause_status = 1
        }else{
            clock = setInterval(myTimer, 30);
            pause_status = 0
        }
    }



    let loop_img = 0
function preloadimg(data){
  loop_img = data.length
    for(let x in data){
    // imgA[x] = new Image()
      imgA[x] = 'img/'+data[x].side1
   //   imgB[x] = new Image()
      imgB[x] = 'img/'+data[x].side2
    console.log(data[x].side1+" / "+data[x].side2)
    console.log(imgB[x].src)
    }


 }

async function load(){
    console.log("Start")
    console.log("Loading")
    const loaddata = await fetch('../../api/xrayimagload.php')
    const text = await loaddata.text();
    let js = JSON.parse(text)
  const preload = preloadimg(js)
  console.log("Finish")
  console.log(imgA[i])
  console.log(imgB[i])
  S1.src = imgA[i]
  S2.src = imgB[i]
}

