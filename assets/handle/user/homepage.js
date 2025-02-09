const leftBtn = document.getElementById("left");
const rightBtn = document.getElementById("right");
const frame = document.querySelector(".frame");

let widthTransform = 0;

leftBtn.addEventListener("click", () => {
    if (widthTransform === 0) return
    else {
        widthTransform += 100
        frame.style.transform = `translateX(${widthTransform}%)`;
        frame.style.transtion = '0.2s all ease';
    }
})

rightBtn.addEventListener("click", () => {
    if (widthTransform === -300) return
    else {
        widthTransform -= 100
        frame.style.transform = `translateX(${widthTransform}%)`;
        frame.style.transtion = '0.2s all ease';
    }
})



