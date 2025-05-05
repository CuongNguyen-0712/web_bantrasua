<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="/old/assets/styles/user/datMua copy.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Mua</title>
    <link rel="icon" href="/web_bantrasua/myapp/public/assets/img/logo.png">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="/web_bantrasua/myapp/public/assets/icon/fontawesome-free-6.6.0-web/">
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

    /* Thêm CSS cho các button đã được chọn */
    .btn.selected {
        background-color: rgb(2, 108, 61);
        color: white;
        border: 1px solid rgb(2, 108, 61);
    }

    .btn-sweet.selected,
    .btn-ice.selected {
        background-color: rgb(2, 108, 61);
        color: white;
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
                                <img class="img"
                                    src="/web_bantrasua/myapp/public/assets/img/<?php echo isset($data['product']['image']) ? $data['product']['image'] : 'trasua_moi-Photoroom.png'; ?>"
                                    alt="hinh tra sua">
                            </div>

                            <div class="Product-decribe">
                                <p> <strong><?php echo isset($data['product']['name']) ? $data['product']['name'] : 'Clover Trà Xanh'; ?></strong>
                                    <?php echo isset($data['product']['description']) ? $data['product']['description'] : 'là sự kết hợp giữa vị trà xanh thanh mát và lớp kem cheese béo mịn, mang đến hương vị hài hòa, ngọt nhẹ và thơm dịu.'; ?>
                                </p>
                            </div>
                        </div>

                        <!-- Header layout -->
                        <header class="header">
                            <div class="header__title-product">
                                <h3̀>
                                    <?php echo isset($data['product']['name']) ? $data['product']['name'] : 'Clover Trà Xanh'; ?>
                                    </h3>
                                    <!-- Nút quay trở lại -->
                                    <button onclick="goBack()" class="btn-back">&#215;
                                    </button>
                            </div>

                            <!-- Nút quay trở lại -->
                            <!-- Header__model -->
                            <div class="header__model-product">
                                <!-- <span>SKU: <?php echo isset($data['product']['sku']) ? $data['product']['sku'] : '65000094'; ?></span> -->
                            </div>
                            <!-- Header__cost-product -->
                            <div class="header__cost-product">
                                <div class="header__price-product"><span
                                        id="displayPrice"><?php echo isset($data['product']['price']) ? number_format($data['product']['price'], 0, ',', '.') : '59.000'; ?></span>&#8363;
                                    <div class="header__quantity-product">
                                        <button class="btn-min" id="decreaseBtn">&#8722;</button>
                                        <span class="count" id="quantityCount">1</span>
                                        <button class="btm-max" id="increaseBtn">&#43;</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Header__size-product -->
                            <div class="header__size-product">Chọn kích cỡ
                                <div class="header__size-product-detail">
                                    <?php if (isset($data['sizes']) && is_array($data['sizes'])): ?>
                                    <?php foreach ($data['sizes'] as $index => $size): ?>
                                    <button class="btn size-btn <?php echo $index === 0 ? 'selected' : ''; ?>"
                                        data-size="<?php echo $size['name']; ?>"
                                        data-price="<?php echo $size['price_difference']; ?>">
                                        <?php echo $size['name']; ?>
                                    </button>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <button class="btn size-btn selected" data-size="M" data-price="0">M</button>
                                    <button class="btn size-btn" data-size="L" data-price="5000">L</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Header__sweet-product -->
                            <div class="header__sweet-product">Ngọt
                                <div class="header__sweet-product-option">
                                    <?php if (isset($data['sweetLevels']) && is_array($data['sweetLevels'])): ?>
                                    <?php foreach ($data['sweetLevels'] as $sweet):
                                            if ($sweet['id'] == 8) {

                                        ?>
                                    <button class="btn-sweet sweet-btn selected >" data-component-id="2"
                                        data-level-id="<?php echo $sweet['id']; ?>"
                                        data-sweet="<?php echo $sweet['name']; ?>">
                                        <?php echo $sweet['name']; ?>
                                    </button>
                                    <?php
                                            } else {
                                            ?>
                                    <button class="btn-sweet sweet-btn  >" data-level-id="<?php echo $sweet['id']; ?>"
                                        data-sweet="<?php echo $sweet['name']; ?>">
                                        <?php echo $sweet['name']; ?>
                                    </button>
                                    <?php
                                            }
                                        endforeach; ?>
                                    <?php else: ?>
                                    <button class="btn-sweet sweet-btn" data-sweet="Ít">Ít</button>
                                    <button class="btn-sweet sweet-btn selected" data-sweet="Bình thường">Bình
                                        thường</button>
                                    <button class="btn-sweet sweet-btn" data-sweet="Nhiều">Nhiều</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Header__ice-product -->
                            <div class="header__ice-product">Đá
                                <div class="header__ice-product-option">
                                    <?php if (isset($data['iceLevels']) && is_array($data['iceLevels'])): ?>
                                    <?php foreach ($data['iceLevels'] as $ice):
                                            if ($ice['id'] == 5) {
                                        ?>
                                    <button class="btn-ice ice-btn selected>" data-level-id="<?php echo $ice['id']; ?>"
                                        data-ice="<?php echo $ice['name']; ?>">
                                        <?php echo $ice['name']; ?>
                                    </button>
                                    <?php
                                            } else {
                                            ?>
                                    <button class="btn-ice ice-btn >" data-level-id="<?php echo $ice['id']; ?>"
                                        data-ice="<?php echo $ice['name']; ?>">
                                        <?php echo $ice['name']; ?>
                                    </button>
                                    <?php
                                            }
                                        endforeach; ?>
                                    <?php else: ?>
                                    <button class="btn-ice ice-btn" data-ice="Ít">Ít</button>
                                    <button class="btn-ice ice-btn selected" data-ice="Bình thường">Bình thường</button>
                                    <button class="btn-ice ice-btn" data-ice="Nhiều">Nhiều</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Header__topping-product -->
                            <div class="header__topping-product">Chọn Topping
                                <?php if (isset($data['toppings']) && is_array($data['toppings'])): ?>
                                <?php foreach ($data['toppings'] as $topping): ?>
                                <div class="header__topping-product-check-box">
                                    <label>
                                        <input type="checkbox" class="topping-checkbox" name="topping[]"
                                            value="<?php echo $topping['id']; ?>"
                                            data-price="<?php echo $topping['price']; ?>">
                                        <span><?php echo $topping['name']; ?></span> -
                                        <span><?php echo number_format($topping['price'], 0, ',', '.'); ?>&#8363;</span>
                                    </label>
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>

                            <!-- header__pay-product -->
                            <div class="header__pay-product">
                                <button class="header__pay-product-bill" id="addToCartBtn">
                                    <a class="header__pay-product-bill-link">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        Thêm vào giỏ hàng: <span
                                            id="totalPrice"><?php echo isset($data['product']['price']) ? number_format($data['product']['price'], 0, ',', '.') : '59.000'; ?></span>&#8363;
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

        // Lấy giá sản phẩm từ dữ liệu PHP
        const basePrice = <?php echo isset($data['product']['price']) ? $data['product']['price'] : 59000; ?>;
        const productId = <?php echo isset($data['product']['id']) ? $data['product']['id'] : 1; ?>;
        const productName =
            "<?php echo isset($data['product']['name']) ? $data['product']['name'] : 'Clover Trà Xanh'; ?>";
        const productImage =
            "<?php echo isset($data['product']['image']) ? $data['product']['image'] : 'trasua_moi-Photoroom.png'; ?>";
        let quantity = 1; // Số lượng mặc định
        let selectedSize = {
            size: '<?php echo isset($data['sizes'][0]['name']) ? $data['sizes'][0]['name'] : 'M'; ?>',
            price: <?php echo isset($data['sizes'][0]['price_difference']) ? $data['sizes'][0]['price_difference'] : 0; ?>
        }; // Size mặc định
        let selectedToppings = []; // Mảng lưu trữ topping đã chọn
        let selectedSweet = null; // Độ ngọt đã chọn
        let selectedIce = null; // Độ đá đã chọn

        // Format số tiền theo định dạng VNĐ
        function formatPrice(price) {
            return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Tính toán tổng giá
        function calculateTotalPrice() {
            // Tính giá cho 1 sản phẩm (giá cơ bản + giá size)
            let singleItemPrice = basePrice + selectedSize.price;

            // Cộng thêm giá các topping đã chọn
            let toppingPrice = 0;
            selectedToppings.forEach(topping => {
                toppingPrice += topping.price;
            });

            singleItemPrice += toppingPrice;

            // Tính tổng giá theo số lượng
            const totalPrice = singleItemPrice * quantity;

            // Hiển thị giá đơn vị và tổng giá
            document.getElementById('displayPrice').textContent = formatPrice(singleItemPrice);
            document.getElementById('totalPrice').textContent = formatPrice(totalPrice);

            return {
                singlePrice: singleItemPrice,
                total: totalPrice
            };
        }

        // Xử lý sự kiện khi trang được tải
        document.addEventListener('DOMContentLoaded', function() {
            // Nút tăng giảm số lượng
            const decreaseBtn = document.getElementById('decreaseBtn');
            const increaseBtn = document.getElementById('increaseBtn');
            const quantityCount = document.getElementById('quantityCount');

            // Xử lý nút giảm số lượng
            decreaseBtn.addEventListener('click', function() {
                if (quantity > 1) {
                    quantity--;
                    quantityCount.textContent = quantity;
                    calculateTotalPrice();
                }
            });

            // Xử lý nút tăng số lượng
            increaseBtn.addEventListener('click', function() {
                quantity++;
                quantityCount.textContent = quantity;
                calculateTotalPrice();
            });

            // Xử lý chọn kích cỡ (size)
            const sizeButtons = document.querySelectorAll('.size-btn');
            sizeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Bỏ selected khỏi tất cả các nút size
                    sizeButtons.forEach(btn => btn.classList.remove('selected'));

                    // Thêm selected vào nút được chọn
                    this.classList.add('selected');

                    // Cập nhật size đã chọn
                    selectedSize = {
                        size: this.getAttribute('data-size'),
                        price: parseInt(this.getAttribute('data-price'))
                    };

                    // Tính toán lại giá
                    calculateTotalPrice();
                });
            });

            // Xử lý chọn độ ngọt
            const sweetButtons = document.querySelectorAll('.sweet-btn');
            sweetButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Bỏ selected khỏi tất cả các nút ngọt
                    sweetButtons.forEach(btn => btn.classList.remove('selected'));

                    // Thêm selected vào nút được chọn
                    this.classList.add('selected');

                    // Cập nhật thông tin ngọt đã chọn (ID 7, 8, 9)
                    selectedSweet = {
                        sweet: this.getAttribute('data-sweet'),
                        componentId: this.hasAttribute('data-component-id') ? parseInt(this
                            .getAttribute('data-component-id')) : 2,
                        levelId: this.hasAttribute('data-level-id') ? parseInt(this
                            .getAttribute('data-level-id')) : (this.getAttribute(
                                'data-sweet') === 'Ít' ? 7 :
                            (this.getAttribute('data-sweet') === 'Bình thường' ? 8 : 9))
                    };
                });
            });

            // Xử lý chọn đá
            const iceButtons = document.querySelectorAll('.ice-btn');
            iceButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Bỏ selected khỏi tất cả các nút đá
                    iceButtons.forEach(btn => btn.classList.remove('selected'));

                    // Thêm selected vào nút được chọn
                    this.classList.add('selected');

                    // Cập nhật thông tin đá đã chọn (ID 4, 5, 6)
                    selectedIce = {
                        ice: this.getAttribute('data-ice'),
                        componentId: this.hasAttribute('data-component-id') ? parseInt(this
                            .getAttribute('data-component-id')) : 1,
                        levelId: this.hasAttribute('data-level-id') ? parseInt(this
                            .getAttribute('data-level-id')) : (this.getAttribute(
                                'data-ice') === 'Ít' ? 4 :
                            (this.getAttribute('data-ice') === 'Bình thường' ? 5 : 6))
                    };
                });
            });

            // Xử lý chọn topping
            const toppingCheckboxes = document.querySelectorAll('.topping-checkbox');
            toppingCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        // Thêm topping vào danh sách đã chọn
                        selectedToppings.push({
                            id: this.value,
                            price: parseInt(this.getAttribute('data-price'))
                        });
                    } else {
                        // Xóa topping khỏi danh sách đã chọn
                        selectedToppings = selectedToppings.filter(topping => topping.id !==
                            this.value);
                    }

                    // Tính toán lại giá
                    calculateTotalPrice();
                });
            });

            // Chọn mặc định các tùy chọn
            // Chọn size mặc định (button đầu tiên)
            if (sizeButtons.length > 0 && !document.querySelector('.size-btn.selected')) {
                sizeButtons[0].classList.add('selected');
                selectedSize = {
                    size: sizeButtons[0].getAttribute('data-size'),
                    price: parseInt(sizeButtons[0].getAttribute('data-price'))
                };
            }

            // Chọn độ ngọt mặc định (bình thường)
            if (sweetButtons.length > 0 && !document.querySelector('.sweet-btn.selected')) {
                const defaultSweetBtn = Array.from(sweetButtons).find(btn => btn.getAttribute('data-sweet') ===
                    'Bình thường');
                if (defaultSweetBtn) {
                    defaultSweetBtn.classList.add('selected');
                    selectedSweet = {
                        sweet: 'Bình thường',
                        componentId: defaultSweetBtn.hasAttribute('data-component-id') ? parseInt(
                            defaultSweetBtn.getAttribute('data-component-id')) : 2,
                        levelId: defaultSweetBtn.hasAttribute('data-level-id') ? parseInt(defaultSweetBtn
                            .getAttribute('data-level-id')) : 8
                    };
                }
            }

            // Chọn đá mặc định (bình thường)
            if (iceButtons.length > 0 && !document.querySelector('.ice-btn.selected')) {
                const defaultIceBtn = Array.from(iceButtons).find(btn => btn.getAttribute('data-ice') ===
                    'Bình thường');
                if (defaultIceBtn) {
                    defaultIceBtn.classList.add('selected');
                    selectedIce = {
                        ice: 'Bình thường',
                        componentId: defaultIceBtn.hasAttribute('data-component-id') ? parseInt(
                            defaultIceBtn.getAttribute('data-component-id')) : 1,
                        levelId: defaultIceBtn.hasAttribute('data-level-id') ? parseInt(defaultIceBtn
                            .getAttribute('data-level-id')) : 5
                    };
                }
            }

            // Tính giá ban đầu
            calculateTotalPrice();

            // Nút thêm vào giỏ hàng
            const addToCartBtn = document.getElementById('addToCartBtn');
            addToCartBtn.addEventListener('click', function() {
                // Tạo đối tượng dữ liệu để gửi đi
                const cartData = {
                    product_id: productId,
                    product_name: productName,
                    product_image: productImage,
                    product_size: selectedSize.size,
                    product_price: basePrice + selectedSize.price + selectedToppings.reduce((total,
                        topping) => total + topping.price, 0),
                    product_quantity: quantity,
                    ice_level: selectedIce ? selectedIce.levelId :
                    5, // Mặc định là bình thường (ID: 5)
                    sweet_level: selectedSweet ? selectedSweet.levelId :
                    8, // Mặc định là bình thường (ID: 8)
                    toppings: JSON.stringify(selectedToppings.map(t => t.id))
                };

                // Tạo form để submit dữ liệu
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/web_bantrasua/myapp/user/order/add';
                form.style.display = 'none';

                // Thêm các trường input vào form
                for (const key in cartData) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key;
                    input.value = cartData[key];
                    form.appendChild(input);
                }

                // Thêm form vào document và submit
                document.body.appendChild(form);
                form.submit();
            });
        });
        </script>
</body>

</html>