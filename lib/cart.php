<?php
    function add_cart($id){
        global $list_product;
        $item = get_product_by_id($id - 1);
        //Them thông tin vào giỏ hàng
        $qty = 1;
        if(isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])){
            $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        }
        $_SESSION['cart']['buy'][$id] = array(
            'id' => $item["id"],
            'url' => $item['url'],
            'product_name' => $item['product_name'],
            "price" => $item['price'],
            'product_thumb' => $item['product_thumb'],
            'code' => $item['code'],
            'qty' => $qty,
            'sub_total' => $qty * $item['price']
        );
        //Cập nhật thông tin cart
        update_info_cart();
    }

    function update_info_cart(){
        if(isset($_SESSION['cart'])){
            $num_total = 0;
            $Total = 0;
            foreach($_SESSION['cart']['buy'] as $item){
                $num_total += $item['qty'];
                $Total += $item['sub_total'];
            }
            $_SESSION['cart']['info'] = array(
                'num_total' => $num_total,
                'total' => $Total
            );
        }
    }
    function get_list_by_cart(){
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart']['buy'] as &$item){
                $item['url_del_cart'] = "?mod=cart&act=delete_item&id={$item['id']}";
            }
            return $_SESSION['cart']['buy'];
        }return false;
    }
    function get_total_cart(){
        if(isset($_SESSION['cart']['info']['total']) && $_SESSION['cart']['info']['total'] > 0){
            return currency_format($_SESSION['cart']['info']['total']);
        }else echo "0đ";
    }
    function delete_cart($id){
        if(!empty($id)){
            if(isset($_SESSION['cart']['buy'][$id])){
                unset($_SESSION['cart']['buy'][$id]);
            }
            update_info_cart();
        }else{
            unset($_SESSION['cart']);
            update_info_cart();
        }
    }
    function update_cart($qty){
        foreach($qty as $id=>$new_qty){
            $_SESSION['cart']['buy'][$id]['qty']  = $new_qty;
            $_SESSION['cart']['buy'][$id]['sub_total']  = $new_qty * $_SESSION['cart']['buy'][$id]['price'];
            update_info_cart();
        }
    }
?>