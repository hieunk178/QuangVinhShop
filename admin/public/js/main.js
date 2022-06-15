$(document).ready(function () {

    var height = $(window).height() - $('#footer-wp').outerHeight(true) - $('#header-wp').outerHeight(true);
    $('#content').css('min-height', height);

//  CHECK ALL
    $('input[name="checkAll"]').click(function () {
        var status = $(this).prop('checked');
        $('.list-table-wp tbody tr td input[type="checkbox"]').prop("checked", status);
    });

// EVENT SIDEBAR MENU
    $('#sidebar-menu .nav-item .nav-link .title').after('<span class="fa fa-angle-right arrow"></span>');
    var sidebar_menu = $('#sidebar-menu > .nav-item > .nav-link');
    sidebar_menu.on('click', function () {
        if (!$(this).parent('li').hasClass('active')) {
            $('.sub-menu').slideUp();
            $(this).parent('li').find('.sub-menu').slideDown();
            $('#sidebar-menu > .nav-item').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        } else {
            $('.sub-menu').slideUp();
            $('#sidebar-menu > .nav-item').removeClass('active');
            return false;
        }
    });
});

// $(".list-product-page .delete").onclick(function(){
//     if(confirm('Xác nhận xóa sản phẩm?')){
//         var masp = $(".list-product-page .masp").val();
//         $.ajax({
//             url: "/admin?page=delete_pro",
//             method: 'POST',
//             data: {
//                 masp : masp
//             },
//             dataType: "text",
//             success: function(result) {
//                 $("#info-cart-wp .subtotal"+id).text(result.subtotal);
//                 $("#info-cart-wp #total-price span").text(result.total_format);
//                 $(".table #total-price").attr('data-total',result.total);
//             },
//             error:function(xhr, ajaxOptions, throwError){
//                 //alert(xhr.status);
//                 alert(throwError);
//             }
//         });
//     }
// });