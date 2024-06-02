document.addEventListener("DOMContentLoaded", function () {
    let success = document.getElementById("succes_job");
    if(success){
        success.style.opacity = 1;
        setTimeout(function () {
            if(success != null)
                success.style.opacity = 0 ;
        }, 8000); 
    }
    
});

function confirm_delete() {
    if (!confirm("Bạn có chắc chắn muốn xóa ?")) {
        event.preventDefault();
    }
}
// add product
function format_price(value) {
    value = value.toString();
    var len = value.length;
    for (var i = len - 3; i > 0; i -= 3) {
        value = value.slice(0, i) + "," + value.slice(i);
    }
    return  value;
}

function view_pre() {
    const fileInput = document.getElementById("img-product");
    const previewImage = document.getElementById("img-pro");

    const file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const imageURL = e.target.result;
            previewImage.src = imageURL;
        };

        reader.readAsDataURL(file);
    }
}

$(document).ready(function () {
    $(".cart_quantity_up, .cart_quantity_down").on("click", function (e) {
        e.preventDefault();

        var cart_id = $(this).data("cart-id");
        var url_cart = $(this).data("url");

        $.ajax({
            type: "GET",
            url: url_cart,
            data: {
            },
            success: function (response) {
                if (response.success) {
                    // Cập nhật số lượng sản phẩm trên giao diện
                    $('.cart_quantity_input[data-cart-id="' + cart_id + '"]').val(response.new_quantity);
                    $('p[data-cart-id="' + cart_id + '"]').text(response.total_price);
                    var tongsanphams = $("p.cart_total_price"); 
                    var totalSum = 0;
                    tongsanphams.each(function () {
                        var value = parseFloat($(this).text().replace(/,/g, "")); 
                        totalSum += value; 
                    });
                    $('#tonggiohang').text(format_price(totalSum));
                } else {
                    // Xử lý khi không thành công
                    alert("Có lỗi xảy ra");
                }
            },
            
        });
    });
});
