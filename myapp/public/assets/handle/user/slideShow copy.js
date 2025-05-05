const listImage = document.querySelector('.list-image')
const imgs = document.getElementsByTagName('img');
const length = imgs.length;
let current = 1;
imgs[0].style.display = "block"

setInterval(()  => {
    if(current === length - 1){
        current = 0; 
    }
    else{
        current++;
    }

    for(let i = 0; i < length; i++){
        if(i === current){
            imgs[current].style.display = 'block';
        }
        else{
            imgs[i].style.display = 'none';
        }
    }
}, 2000)

// const listImage = document.querySelector('.list-image')
// const imgs = document.getElementsByTagName('img');
// const length = imgs.length;
// let current = 0

// setInterval(()  => {
//     if( current == length - 1){
// current = 0
// let width = imgs[0].offsetWidth
// listImage.style.transform = 'translateX(${width * -1 * current}px)'

//     }else{

//     current ++
//     let width = imgs[0].offsetWidth
//     listImage.style.transform = 'translateX(${width * -1 * current}px)'
// }
// }, 4000)
//     if(current === length - 1){
//         current = 0; 
//     }
//     else{
//         current++;
//     }

//     for(let i = 0; i < length; i++){
//         if(i === current){
//             imgs[current].style.display = 'block';
//         }
//         else{
//             imgs[i].style.display = 'none';
//         }
//     }
// }, 2000)
