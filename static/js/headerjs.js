const canvasH = document.getElementById("canvasheader");
const cH = canvasH.getContext("2d");
const body = document.querySelector('body');

canvasH.width = body.clientWidth;
canvasH.height = 90;

class SpriteH {
    constructor({position, imageSrc, framesMax = 1}) {
        this.position = position;
        this.image = new Image();
        this.image.src = imageSrc;
        this.framesMax = framesMax;
        this.framesCurrent = 0;
        this.framesElapsed = 0;
        this.framesHold = 10;        
    }

    draw() {
        cH.drawImage(
            this.image,
            this.framesCurrent * (this.image.width / this.framesMax),
            0,
            this.image.width / this.framesMax,
            this.image.height,
            this.position.x,
            this.position.y,
            this.image.width / this.framesMax,
            this.image.height
        );
        this.animateFrames();
    }

    animateFrames() {
        this.framesElapsed++;
        if (this.framesElapsed % this.framesHold === 0) {
          if (this.framesCurrent < this.framesMax - 1) {
            this.framesCurrent++;
          } else {
            this.framesCurrent = 0;
          }
        }
    }   
}
class BackgroundH extends SpriteH {
    constructor({
      position,
      velocity,
      size,
      imageSrc,
      framesMax,
      slideOffsetMax,
    }) {
      super({
        position,
        imageSrc,
        framesMax,
      });
      this.velocity = velocity;
      this.size = size;
      this.slideOffsetMax = slideOffsetMax;
    }
  
    update() {
      this.draw();
      this.position.x += this.velocity;
      if (this.position.x + this.velocity <= this.slideOffsetMax) {
        this.position.x = 0;
      }
    }
}

const backgroundH = new BackgroundH({
    position: {
      x: 0,
      y: 0,
    },
    size: {
      x: 0,
      y: 0,
    },
    imageSrc: "./static/img/headerparallaxe.png",
    velocity: -1,
    slideOffsetMax: -1601,
});
const groundH = new BackgroundH({
    position: {
        x: 0,
        y: 70,
    },
    size: {
        x: 0,
        y: 0,
    },
    imageSrc: "./static/img/headerground.png",
    velocity: -4,
    slideOffsetMax: -65,
});

let positionX = (window.innerWidth - 45)/2 
const poupouleH = new SpriteH({
    position: {
        x: positionX,
        y: 30,
    },
    size: {
        x: 0,
        y: 0,
    },
    imageSrc: "./static/img/poupoule.png",
    framesMax: 3
})

function animateH() {
    window.requestAnimationFrame(animateH); 
    backgroundH.update();
    groundH.update();
    poupouleH.draw();
}

animateH();

window.addEventListener('resize', () => {
    canvasH.width = body.clientWidth;
    poupouleH.position.x = (window.innerWidth - 45)/2;
})

let mousePositionX = 0;

const header = document.querySelector("header");
header.addEventListener('mousemove', (e)=>{
    mousePositionX = e.clientX -22;
    poupouleH.position.x = mousePositionX;
})

const flash_error = document.querySelector('.flash_error');
const flash_success =document.querySelector('.flash_success');
if(flash_error) {
  setTimeout(()=>{
    flash_error.classList.add('displayNone')},
    5000
  );
}
if(flash_success) {
  setTimeout(()=>{
    flash_success.classList.add('displayNone')},
    5000
  );
}

