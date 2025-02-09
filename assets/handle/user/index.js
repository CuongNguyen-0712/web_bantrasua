const main = document.getElementById("main");
const btns = document.querySelectorAll('.btn');
const navigation = document.querySelector('#navigation');

for(let i = 0; i < btns.length; i++) {
    btns[i].addEventListener('click', () => {
        btns.forEach(btn => {
            btn.classList.remove('active');
        })
        btns[i].classList.add('active');
        window.scrollTo({top: 0, behavior: 'smooth'});
        navigation.style.transform = `translateX(${i * 120 * 2}px)`;
        navigation.style.transtion = '0.2s all ease';
    })
}

document.addEventListener("DOMContentLoaded", () => {
  const iframe = document.getElementById("myIframe");

  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      iframe.src = btn.getAttribute('path')
    })
  })

  function updateIframeHeight() {
    if(iframe.src === "http://127.0.0.1:5500/pages/user/product.html"){
      iframe.style.height = '100dvh'
      main.style.height = '100dvh'
    }
    else{
      const iframeContent = iframe.contentDocument || iframe.contentWindow.document;
      if (iframeContent) {
        const contentHeight = iframeContent.body.scrollHeight;
        iframe.style.height = contentHeight + "px";
        main.style.height = contentHeight + "px";
      }
    }
  }

  iframe.addEventListener("load", () => {
    updateIframeHeight(); 

    const iframeContent = iframe.contentDocument || iframe.contentWindow.document;
    if (iframeContent) {
      const buyBtn = iframeContent.querySelectorAll('.buy');
      const cartBtn = iframeContent.querySelectorAll('.cart');
      const buttons = [...buyBtn, ...cartBtn];
      
      for (let btn of buttons) {
        btn.setAttribute("disabled", "true");
      }
    }
  });

  window.addEventListener("resize", updateIframeHeight);
});

