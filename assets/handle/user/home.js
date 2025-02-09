const main = document.getElementById("main");
const btns = document.querySelectorAll('.btn');
const navigation = document.querySelector('#navigation');

for (let i = 0; i < btns.length; i++) {
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
  const iframeBuy = document.getElementById("iframeBuy");

  const params = new URLSearchParams(window.location.search);
  const iframeSrc = params.get('iframe');
  if(iframeSrc){
    iframe.src = iframeSrc
    if(iframeSrc === './product.html'){
      btns.forEach(btn => {
        if(btn.getAttribute('path') === './product.html'){
          btn.classList.add('active')
          navigation.style.transform = `translateX(${1 * 120 * 2}px)`;
          navigation.style.transtion = '0.2s all ease';
        }
        else{
          btn.classList.remove('active')
        }
      })
    }
  }

  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      iframe.src = btn.getAttribute('path')
      iframeBuy.contentWindow.location.reload();
    })
  })

  iframeBuy.addEventListener('load', () => {
    const iframeContent = iframe.contentDocument || iframe.contentWindow.document;
    const buyBtn = iframeContent.querySelectorAll('.buy');
    const cartBtn = iframeContent.querySelectorAll('.cart');

    iframeContent.addEventListener("click", () => {
      document.getElementById("account-user").classList.remove("active");
    });
    const post = (value) => {
      iframeBuy.contentWindow.postMessage(value, '*');
    }

    buyBtn.forEach(btn => {
      btn.addEventListener('click', () => {
        post('buy');
      })
    })

    cartBtn.forEach(btn => {
      btn.addEventListener('click', () => {
        post('cart');
      })
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
        btn.removeAttribute("disabled");
      }
    }
  });

  window.addEventListener("resize", updateIframeHeight);
});

document.getElementById("logout").addEventListener("click", () => {
  window.location.href = '/index.html';
})

const account_user = document.getElementById("account-user");
const account_feature = document.getElementById("account-feature");

account_user.addEventListener("click", (e) => {
  e.stopPropagation();
  account_user.classList.toggle("active");
});

document.addEventListener("click", (e) => {
  if (!account_user.contains(e.target) && !account_feature.contains(e.target)) {
    account_user.classList.remove("active");
  }
});

document.getElementById('info').addEventListener('click', () => {
  const iframeInfo = './information.html'
  window.location.href = `/pages/user/manage.html?iframe=${encodeURIComponent(iframeInfo)}`;
})

document.getElementById('purchase').addEventListener('click', () => {
  const iframePayment = './purchase.html'
  window.location.href = `/pages/user/manage.html?iframe=${encodeURIComponent(iframePayment)}`;
})

document.getElementById('cart').addEventListener('click', () => {
  window.location.href = './cart.html'
})

