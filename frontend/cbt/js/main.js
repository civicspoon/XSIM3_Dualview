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

//////////////////////////
let timer = 0
function clock_timer(){
    timer++
    console.log(convertHMS(timer))
  //  alert(timer)    
  drawclock()
}
function drawclock(){
  lcd_screen2.ctx.fillStyle = 'white'
  lcd_screen2.ctx.fillRect(CANVAS_WIDTH-200,25,180,65)
  lcd_screen2.ctx.fillStyle = "black"
  lcd_screen2.ctx.font = "60px Fantasy"
  lcd_screen2.ctx.fillText(convertHMS(timer),CANVAS_WIDTH-200,80)

  ////// Score & Img Count
  lcd_screen.ctx.fillStyle='black'
  lcd_screen.ctx.font = "60px Fantasy"
  lcd_screen.ctx.fillText('Score : '+score,10,80)
  lcd_screen.ctx.fillText('Image : '+img_count,CANVAS_WIDTH-300,80)
}
 
setInterval(function () {clock_timer()}, 1000)

function convertHMS(value) {
    const sec = parseInt(value, 10); // convert value to number if it's string
    let hours   = Math.floor(sec / 3600); // get hours
    let minutes = Math.floor((sec - (hours * 3600)) / 60); // get minutes
    let seconds = sec - (hours * 3600) - (minutes * 60); //  get seconds
    // add 0 if value < 10; Example: 2 => 02
    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return minutes+':'+seconds; // Return is HH : MM : SS


}

//////////////



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
        up_btn.click()
        const myTimeout = setTimeout(()=>{up_btn.unclick()},100);

        console.log("Up")
        y_pos +=10
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      if(e.key=='ArrowDown'){
        console.log("Down")
        dwn_btn.click()
        const myTimeout = setTimeout(()=>{dwn_btn.unclick()},100);
        y_pos -=10
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      if(e.key=='ArrowLeft'){
        l_btn.click()
        const myTimeout = setTimeout(()=>{l_btn.unclick()},100);
        console.log("Left")
        x_pos -=10
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      if(e.key=='ArrowRight'){
        r_btn.click()
        const myTimeout = setTimeout(()=>{r_btn.unclick()},100);
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
        document.getElementById('catid').focus()
        pause()
      }
      if(e.key=='PageUp'){
        scale_ratio +=50
        Pup_btn.click()
        const myTimeout = setTimeout(()=>{Pup_btn.unclick()},100);
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
        console.log("Space")
      }
      if(e.key=='PageDown'){
        scale_ratio -=50
        Pdwn_btn.click()
        const myTimeout = setTimeout(()=>{Pdwn_btn.unclick()},100);
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
        console.log("Space")
      }

      /// P1
      if(e.key=='1'){
        P1.unclick()
        P1.click()
        invert()
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      /// P2
      if(e.key=='2'){
        P2.unclick()
        P2.click()
        grayscale()
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)
      }
      /// P3
      if(e.key=='3'){
        resetfilter()
        P3.click()
        const myTimeout = setTimeout(()=>{P3.unclick()},100);
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

        Q_btn.click()
        const myTimeout = setTimeout(()=>{Q_btn.unclick()},100);

        
        pause_status = 1
        x_pos -=10
        lcd_screen.clear_screen()
        drawXray(lcd_screen,S1)
       lcd_screen2.clear_screen()
        drawXray(lcd_screen2,S2)

    }
    // forward
    if(e.key=='e'){
      E_btn.click()
      const myTimeout = setTimeout(()=>{E_btn.unclick()},100);
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

function key_timout(key){
  const myTimeout = setTimeout(myGreeting, 500);

  key.unclick()
}
function myGreeting() {
  document.getElementById("demo").innerHTML = "Happy Birthday!"
}
//////////////////////////////////// btn class
class SoftBtn{
  constructor(name,topx,topy,bottomx,bottomy){
    this.name = name
    this.topx = topx
    this.topy = topy
    this.bottomx = bottomx
    this.bottomy = bottomy
    let status = false
  }
  click(){
    keyboard.ctx.fillStyle = 'rgba(0,0,0,0.8)'
    keyboard.ctx.fillRect(this.topx,this.topy,this.bottomx,this.bottomy)
    console.log("P1")
  }
  unclick(){
    keyboard.ctx.drawImage(x1,0,0,window.innerWidth,150)
    // keyboard.ctx.fillStyle = 'rgba(225,0,0,0)'
    // keyboard.ctx.clearRect(this.topx,this.topy,this.bottomx,this.bottomy)
    console.log("P1 Unclick")
  }
  
}
//// Declare Button
let stop_btn = new SoftBtn('stop_btn',899,20,190,50)
let P1 = new SoftBtn('P1',44,49,190,50)
let P2 = new SoftBtn('P2',248,49,190,50)
let P3 = new SoftBtn('P3',452,49,190,50)
let Q_btn = new SoftBtn('Q_btn',700,20,190,50)
let E_btn = new SoftBtn('E_btn',1103,20,190,50)
let Pup_btn = new SoftBtn('Pup_btn',1820,9,70,50)
let Pdwn_btn = new SoftBtn('Pdwn_btn',1604,9,70,50)
let up_btn = new SoftBtn('up_btn',1442,9,40,25)
let dwn_btn = new SoftBtn('dwn_btn',1442,115,40,25)
let l_btn = new SoftBtn('l_btn',1365,62,40,25)
let r_btn = new SoftBtn('r_btn',1515,62,40,25)
////////////////////////////////////////////
//report the mouse position on click

let kbb = document.getElementById('keyboard')
kbb.addEventListener('click',(e)=>{
  let  mousePos = getMousePos(kbb, e);
  alert(mousePos.x + ',' + mousePos.y);
  let x = mousePos.x
  let y = mousePos.y
//1796,87,1892,143
   if(x>=1796 && x<=1896 && y >=90 && y<=150){
    exitcbt.show()
   }


  
}, false)

function getMousePos(canvas, evt) {
  var rect = canvas.getBoundingClientRect();
  return {
      x: evt.clientX - rect.left,
      y: evt.clientY - rect.top
  };
}
//////////////////////////// Xray img  Load

function drawXray(screen,img){
    
    let Mid_Y =(CANVAS_HEIGHT/2) -  (img.height/2) 
    let xx = x_pos-img.width

    screen.ctx.drawImage(img,xx,Mid_Y-y_pos, img.width+scale_ratio,img.height+scale_ratio)
    drawclock()
    if (xx >= CANVAS_WIDTH){
      console.log(imgA[i])
      console.log(imgB[i])
      x_pos = 0
      y_pos = 0
      scale_ratio =0
  
        i++
        img_count++
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
            stop_btn.click()
            pause_status = 1
        }else{
            clock = setInterval(myTimer, 30);
            stop_btn.unclick()
            pause_status = 0
        }
    }


let ansarray = []
    let loop_img = 0
function preloadimg(data){
  loop_img = data.length
    for(let x in data){
      ansarray[x]=data[x].type
    // imgA[x] = new Image()
      imgA[x] = 'img/'+data[x].side1
   //   imgB[x] = new Image()
      imgB[x] = 'img/'+data[x].side2
    console.log(data[x].side1+" / "+data[x].side2)
    console.log(imgB[x].src+" "+ ansarray[x])
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

