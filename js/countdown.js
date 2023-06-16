///////////////////////////////////////////////////
// variables
let time,
    countDownDate,/*15 secondi*/
    reverseFlapDirection = true,
    bgColor = "255, 184, 0",
    fontColor = "255,255,255",
    segments = 10,
    html = "",
    div = document.querySelector(".countdown"),
    splitFlaps = [];

//setInterval(updateTime, 10);
///////////////////////////////////////////////////
// set up html
var divHidden; 
for (var x = 0; x < 8; x++) {
	if(x<4) 
		divHidden = " hidden ";
	else divHidden = "";
  html += 
    `<div class="splitflap `+divHidden+`">
        <div class="front-top"></div>
        <div class="front-full"></div>
        <div class="back-top"></div>
        <div class="back-full"></div>
    </div>`;
}
div.innerHTML = html;
document.documentElement.style.setProperty("--rgb", bgColor);
document.documentElement.style.setProperty("--fontColor", fontColor);
document.documentElement.style.setProperty("--segments", segments);
document.documentElement.style.setProperty("--animationDirection", reverseFlapDirection ? "reverse" : "normal");

document.querySelectorAll(".splitflap").forEach(element => {
  let array = element.querySelectorAll("div");
  splitFlaps.push(array);
});
///////////////////////////////////////////
// time functions
function updateTime() {
  time = separateIntoSingleDigits(currentTimeLeft());

  setTimeout(()=>{
    if (prevSecond !== time[7]){
    time.forEach((num, i) => doSplitflap(splitFlaps[i], num));
    prevSecond = time[7]
  }
    
  },100)
  
}
///////////////////////////////////////////
//
let prevSecond;
let currentTimeLeft = function() {
	let now = new Date().getTime(),
      distance = countDownDate - now;

	let days = Math.floor(distance / (1000 * 60 * 60 * 24)),
      hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
      minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
      seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
	if (distance < 0) {
            
		clearInterval(currentTimeLeft);
		
		/*INSERIRE IL SUONO DEL GONG*/
		return ["00", "00", "00", "00"]; 

	}else {
		//return ["00", "00", "00", seconds];
		return [days, hours, minutes, seconds];
	}
	return [days, hours, minutes, seconds];
}
///////////////////////////////////////////
function separateIntoSingleDigits(time) {
  return time
    .map(num => ("0" + num.toString()).slice(-2)) // add 0 in front of single digit
    .join("")
    .split("");
}
///////////////////////////////////////////
    function doSplitflap(splitflapGroup, num) {
      const [frontTop, frontFull, backTop, backFull] = splitflapGroup;
      
      if (reverseFlapDirection) flapDirection(backTop,frontTop,backFull,frontFull)
      else flapDirection(frontTop,backTop,frontFull,backFull)
      
      function flapDirection(top1,top2,full1,full2){
        if (num !== top1.innerHTML) {
          top1.innerHTML = full1.innerHTML = top2.innerHTML;
          top2.innerHTML = full2.innerHTML = num;
    
          if (num !== top1.innerHTML)
            animate(frontFull,"flip1"), animate(backTop,"flip2");
        }
      }
    }
///////////////////////////////////////////
function animate(el, cssClass) {
  el.classList.remove(cssClass);
  el.offsetWidth = el.offsetWidth;
  el.classList.add(cssClass);
}








