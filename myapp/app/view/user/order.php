<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="/old/assets/styles/user/datMua copy.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Mua</title>
    <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png">
    <link rel="stylesheet" href="">
    <link href="/assets/font/Arimo-VariableFont_wght.ttf" rel="stylesheet">
    <link rel="stylesheet" href="/assets/icon/fontawesome-free-6.6.0-web/">
    <style>
    .html,
    body {
        font-family: Arimo, sans-serif;
        font-size: 14px;
        line-height: 1.5;
        color: rgb(2, 108, 61);
    }

    .modal {
        display: flex;
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
    }

    .modal__over-lay {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal__body {
        width: 70%;
        background-color: #fcf8f8;
        border-radius: 5px;
        margin: auto;
        position: relative;
    }

    /* Order */
    .Order {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
    }

    .Img__product {
        width: 40%;
        display: block;
        justify-content: center;
        align-items: center;
        /* padding: 20px; */
        box-sizing: border-box;
    }

    .Product-decribe {
        text-indent: 20px;
        /* text-transform: capitalize; */
        padding: 0 35px 40px 35px;
        font-style: italic;
    }

    .Img__product-decribe {
        width: 100%;
        justify-content: center;
        align-items: center;
    }

    .Img__product-decribe img {
        max-width: 70%;
        ;
        background-color: rgb(239, 238, 238);
        padding: 30px 10px;
        border-radius: 10px;
        margin: 10%;
        z-index: 1000;
    }

    /* Header__layout */
    .header {
        width: 60%;
        justify-content: space-between;
        margin-top: 2%;
        font-weight: 300;
        /* padding: 0 0px 0 100px; */

    }

    .header__title-product {
        width: 100%;
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 20px;
        font-weight: 600;
    }

    .header__title-product h3 {
        margin: 0;
    }

    /* Nút quay trở lai */
    .btn-back {
        position: absolute;
        top: -24%;
        right: 0;
        margin-left: 0px;
        text-decoration: none;
        background-color: #fcf8f8;
        border: none;
        border-radius: 3px;
        font-size: 40px;
        color: rgb(2, 108, 61);
        font-weight: 100;
        padding: 4px 10px;
        cursor: pointer;
    }

    .btn-back:hover {
        border-radius: 5px;
        background-color: #f1efef;

    }

    */

    /* Header_model-product */
    .header__model-product {
        color: #424141;
        font-size: 12px;
        font-weight: 300;

    }

    /* Header__cost-product */
    /* .header__cost-product{
    display: flex;
    justify-content:space-around;
} */
    .header__price-product {
        display: flex;
        padding: 0 0px;
        font-size: 20px;
    }

    .header__quantity-product {
        padding: 0 50px;
        margin-left: 20px;

    }

    .btn-min {
        background-color: rgb(2, 108, 61);
        border: none;
        outline: none;
        font-size: 16px;
        color: white;
        font-weight: 200;
        border-radius: 2px;
        padding: 4px 10px;
    }

    .btn-min:hover {
        opacity: 0.8;
        cursor: pointer;
    }

    .btm-max:hover {
        opacity: 0.8;
        cursor: pointer;
    }

    .count {
        margin-left: 10px;
        margin-top: 10px;
    }

    .btm-max {
        background-color: rgb(2, 108, 61);
        border: none;
        outline: none;
        margin-left: 10px;
        font-size: 16px;
        color: white;
        font-weight: 100;
        border-radius: 2px;
        padding: 4px 10px;
    }

    /* Header__size-product */
    .header__size-product {
        font-weight: 700;
        margin-top: 20px;
    }

    .header__size-product-detail {
        font-weight: bolder;

    }

    .btn {
        gap: 10px;
        margin-top: 5px;
        padding: 15px 30px;
        border-radius: 5px;
        border: 1px solid rgb(211, 211, 211);
        background-color: rgba(255, 255, 255, 0.8);
        color: rgb(0, 0, 0);

    }

    .btn:hover {
        background-color: #f5f5f5;
        cursor: pointer;
    }

    /* Header__sweet-product */
    .header__sweet-product {
        margin-top: 20px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .header__sweet-product-option {
        display: flex;
        height: max-content;
        width: max-content;
        gap: 20px;
        margin-top: 5px;

    }

    .btn-sweet {
        background-color: rgba(240, 238, 238, 0.8);
        color: rgb(0, 0, 0);
        border: none;
        outline: none;
        padding: 8px 15px;
        border-radius: 2px;
        cursor: pointer;
    }

    .btn-sweet:hover {
        background-color: rgb(2, 108, 61);
        color: white;
    }

    /* Header__ice-prodcut */
    .header__ice-product {
        margin-top: 20px;
        font-weight: 700;

    }

    .header__ice-product-option {
        display: flex;
        margin-top: 5px;
        height: max-content;
        width: max-content;
        gap: 20px;
    }

    .btn-ice {
        background-color: rgba(240, 238, 238, 0.8);
        color: rgb(0, 0, 0);
        border: none;
        outline: none;
        padding: 8px 15px;
        border-radius: 2px;
        cursor: pointer;
    }

    .btn-ice:hover {
        background-color: rgb(2, 108, 61);
        color: white;
    }

    /* <!-- Header__topping-product --> */
    .header__topping-product {
        width: 100%;
        font-weight: 700;
        margin-top: 20px;
        font-size: 14px;
    }

    .header__topping-product-check-box {
        display: flex;
        color: rgb(110, 108, 108);
        font-weight: 100;
        margin-top: 10px;
        justify-content: space-between;
    }

    .header__topping-product-quantity {
        display: flex;
        justify-content: flex-end;
        font-size: 16px;
        margin-right: 8%;
    }

    .btn-topping {
        background-color: rgba(240, 238, 238, 0.8);
        border: none;
        outline: none;
        font-size: 12px;
        color: rgb(2, 108, 61);
        font-weight: 700;
        border-radius: 5px;
        padding: 8px 8px;
        cursor: pointer;
    }

    .count {
        margin-right: 10px;
        margin-left: 10px;
        margin-top: 5px;
    }

    .btn-topping:hover {
        color: white;
        background-color: rgb(2, 108, 61);
    }

    /* Header__pay-product */
    .header__pay-product {
        display: flex;
        justify-content: center;
        padding: 30px 10px;
    }

    .header__pay-product-bill {
        background-color: rgb(2, 108, 61);
        color: white;
        border: none;
        outline: none;
        border-radius: 5px;
        padding: 8px 30px;
    }

    .header__pay-product-bill:hover {
        opacity: 0.8;
    }

    .header__pay-product-bill-link {
        color: rgb(254, 254, 254);
        text-decoration: none;
    }

    .header__topping-product {
        width: 100%;
        font-weight: 700;
        margin-top: 20px;
        font-size: 14px;
    }

    .header__topping-product-check-box {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        margin: 10px 0;
        background-color: #f3f3f3;
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: background-color 0.3s;
    }

    .header__topping-product-check-box:hover {
        background-color: #e6f5ec;
    }

    .header__topping-product-check-box input[type="checkbox"] {
        margin-right: 12px;
        transform: scale(1.2);
        accent-color: rgb(2, 108, 61);
    }

    .header__topping-product-check-box label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: normal;
        color: #333;
        width: 100%;
        cursor: pointer;
    }

    .header__topping-product-check-box span {
        font-size: 14px;
    }

    .header__topping-product-check-box span:last-child {
        margin-left: auto;
        font-weight: bold;
        color: rgb(2, 108, 61);
    }
    </style>
</head>

<body>
    <!-- Modal -->
    <div class="modal">
        <div class="modal">
            <div class="modal__over-lay">

            </div>
            <div class="modal__body">
                <div class="modal__inner">
                    <!-- Order -->
                    <div class="Order">
                        <div class="Img__product">
                            <div class="Img__product-decribe">
                                <img class="img" src="public/assets/img/trasua_moi-Photoroom.png" alt="hinh tra sua">
                            </div>

                            <div class="Product-decribe">
                                <p> <strong>Clover Trà Xanh</strong> là sự kết hợp giữa vị trà xanh thanh mát và lớp kem
                                    cheese béo mịn, mang đến hương vị hài hòa, ngọt nhẹ và thơm dịu.</p>
                            </div>
                        </div>

                        <!-- Header layout -->
                        <header class="header">
                            <div class="header__title-product">
                                <h3̀> Clover Trà Xanh </h3>
                                    <!-- Nút quay trở lại -->
                                    <button onclick="goBack()" class="btn-back">&#215;
                                    </button>
                            </div>

                            <!-- Nút quay trở lại -->
                            <!-- Header__model -->
                            <div class="header__model-product">
                                <span>SKU: 65000094</span>
                            </div>
                            <!-- Header__cost-product -->
                            <div class="header__cost-product">
                                <div class="header__price-product">59.000&#8363;
                                    <div class="header__quantity-product">
                                        <button class="btn-min">&#8722;</button>
                                        <span class="count">1</span>
                                        <button class="btm-max">&#43;</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Header__size-product -->
                            <div class="header__size-product">Chọn kích cỡ
                                <div class="header__size-product-detail">
                                    <button class="btn">M</button>
                                    <button class="btn">L</button>
                                </div>
                            </div>
                            <!-- Header__sweet-product -->
                            <div class="header__sweet-product">Ngọt
                                <div class="header__sweet-product-option">
                                    <button class="btn-sweet">Ít</button>
                                    <button class="btn-sweet">Bình thường</button>
                                    <button class="btn-sweet">Nhiều</button>
                                </div>
                            </div>
                            <!-- Header__ice-product -->
                            <div class="header__ice-product">Đá
                                <div class="header__ice-product-option">
                                    <button class="btn-ice">Ít</button>
                                    <button class="btn-ice">Bình thường</button>
                                    <button class="btn-ice">Nhiều</button>
                                </div>
                            </div>
                            <!-- Header__topping-product -->
                            <!-- Header__topping-product -->
                            <div class="header__topping-product">Chọn Topping
                                <div class="header__topping-product-check-box">
                                    <label>
                                        <input type="checkbox" name="topping[]" value="tran-chau-den">
                                        <span>Trân châu đen</span> - <span>10.000&#8363;</span>
                                    </label>
                                </div>
                                <div class="header__topping-product-check-box">
                                    <label>
                                        <input type="checkbox" name="topping[]" value="hat-thuy-tinh">
                                        <span>Hạt thủy tinh củ năng</span> - <span>10.000&#8363;</span>
                                    </label>
                                </div>
                                <div class="header__topping-product-check-box">
                                    <label>
                                        <input type="checkbox" name="topping[]" value="kem-cheese">
                                        <span>Kem Cheese khứ hồi</span> - <span>10.000&#8363;</span>
                                    </label>
                                </div>
                            </div>

                            <!-- header__pay-product -->
                            <div class="header__pay-product">
                                <button class="header__pay-product-bill">
                                    <a href="index.php?url=order/checkout" class="header__pay-product-bill-link">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        Thêm vào giỏ hàng: 59.000&#8363;
                                    </a>
                                </button>
                            </div>
                    </div>
                </div>
                </header>
            </div>
        </div>
        <script>
        function goBack() {
            window.history.back();
        }
        </script>
</body>

</html>