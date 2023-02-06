const SCREEN_HEIGHT = screen.height
const SCREEN_WIDTH = screen.width
const CANVAS_HEIGHT = window.innerHeight-200
const CANVAS_WIDTH = (window.innerWidth /2)-10



 let x1 = new Image 
    x1.src = 'src/xsim_keyboard.png'
    let S1 = new Image();
    S1.src= 'img/S1.jpg'

    let S2 = new Image();
    S2.src= 'img/S2.jpg'
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
    }
    clear_screen(){
        this.ctx.fillStyle = 'white'
        this.ctx.fillRect(0,0,CANVAS_WIDTH,CANVAS_HEIGHT)
    }
}




const lcd_screen = new _canvas("screen_canvas")
const lcd_screen2 = new _canvas("screen2_canvas")
const keyboard = new _canvas("keyboard")
myCanvas = document.getElementById('C_Area');
let x_pos=0 

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
    let l1 = await lcd_screen.start(CANVAS_WIDTH,CANVAS_HEIGHT)
    let l2 = await lcd_screen2.start(CANVAS_WIDTH,CANVAS_HEIGHT)
    let kb = await keyboard.start(window.innerWidth,150)

    drawXray(lcd_screen,S1)
    drawXray(lcd_screen2,S2)

    keyboard.ctx.drawImage(x1,0,0,window.innerWidth,150)
    console.log(window.innerWidth)
    let x = 0   
//setInterval(myTimer, 30);

// C_Area.start(); 
//     C_Area.context.drawImage(x1,-20,0,1830,256)    


/////// KEY Binding
    document.addEventListener('keydown', function(e) {
       // if(event.key == "a") {
           console.log(e.key);
      //  }
      if(e.key=='ArrowUp'){
        console.log("Up")
      }
      if(e.key=='ArrowDown'){
        console.log("Down")
      }
      if(e.key=='ArrowLeft'){
        console.log("Left")
      }
      if(e.key=='ArrowRight'){
        console.log("Right")
      }
      if(e.key==' '){
        console.log("Space")
      }

      /// P1
      if(e.key=='1'){
        invert()
      }
      /// P2
      if(e.key=='2'){
        grayscale()
      }
      /// P3
      if(e.key=='3'){
        resetfilter()
      }
      // pause
      if(e.key=='w'){
        pause()
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

    screen.ctx.drawImage(img,xx,Mid_Y, img.width,img.height)
    if (xx >= CANVAS_WIDTH){
        x_pos = 0
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