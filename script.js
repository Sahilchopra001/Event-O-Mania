function one(){
    document.getElementById("slide-image").src = "slide7.jpg";
}
function two(){
    document.getElementById("slide-image").src = "slide2.jpg";
}
function three(){
    document.getElementById("slide-image").src = "slide8.jpg";
}
function four(){
    document.getElementById("slide-image").src = "slide6.jpg";
}
function five(){
    document.getElementById("slide-image").src = "slide10.jpg";
}
function six(){
    document.getElementById("slide-image").src = "slide11.jpg";
}
setInterval(one,2000);
setInterval(two,4000);
setInterval(three,6000);
setInterval(four,8000);
setInterval(five,10000);
setInterval(six,12000);






function noorders(){
    alert("You have no Orders Yet !");
}




let flag1 = 0;

function controller1(x1){
    flag1 = flag1 + x1;
    slideshow1(flag1);
}

slideshow1(flag1);

function slideshow1(num1){
    let slides1 = document.getElementsByClassName("small-slide");

    if(num1 == slides1.length){
        flag1 = 0;
        num1 = 0;
    }
    if(num1 < 0){
        flag1  = slides1.length - 1;
        num1 = slides1.length - 1;
    }

    for(let b of slides1){
        b.style.display = "none";
    }

    slides1[num1].style.display = "block";
}








burger = document.querySelector('.burger');
menu = document.querySelector('.menu');
offers = document.querySelector('#offers');

burger.addEventListener('click',function(){
    menu.classList.toggle('visible');
    offers.classList.toggle('invisible')
})





let temp = 0;

function control(x){
    temp = temp + x;
    imageslide(temp);
}

imageslide(temp);

function imageslide(num){
    let slides = document.getElementsByClassName("small-slides");

    if(num == slides.length){
        temp = 0;
        num=0;
    }
    if(num < 0){
        temp  = slides.length - 1;
        num = slides.length - 1;
    }

    for(let y of slides){
        y.style.display = "none";
    }

    slides[num].style.display = "block";
}


