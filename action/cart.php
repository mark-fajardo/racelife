<?php

    session_start();
    $filename = '../data/cart.txt';

    if (isset($_GET['fetch']) == true) {
        $total = 0;
        $content = file($filename);
        echo '<div style="margin: 50px auto; background-color: white; border: 1px solid #ccc; border-color: lightgrey; width: 500px; border-radius: 4px; padding: 20px"><h3>Cart</h3><table style="width: 100%;"><thead></thead><tbody>';

        if (isset($content[0]) == false) {
            echo '<tr style="font-size: large;">';
            echo '<td style="text-align: center; padding-bottom: 40px">No Items</td>';
            echo '</tr></tbody></table>';
        } else {
            $cart = explode('*', $content[0]);
            for ($i = 0; $i < count($cart); $i++) {
                $item = explode('_', $cart[$i]);
                echo '<tr style="font-size: large;">';
                echo '<td style="text-align: left; width: 70%">' . $item[1] . '</td>';
                echo '<td style="text-align: right; width: 30%">₱ ' . $item[2] . '.00</td>';
                echo '</tr>';
                $total += $item[2];
            }

            echo '</tbody></table><hr><table style="width: 100%;"><thead></thead><tbody><tr style="font-size: 25px;"><td style="text-align: left; width: 30%">Total:</td>';
            echo '<td style="text-align: right; width: 70%">₱ ' . $total . '.00</td>';
            echo '</tr></tbody></table>';
            echo '<button onclick="checkout()" style="margin-top: 10px; border-radius: 8px; background-color: #4CAF50; border: none; color: white; padding: 10px 15px; text-align: center; text-decoration: none; cursor: pointer;">Checkout</button>';
            echo '</div>';
        }


        return;
    }

    $xml = new DOMDocument();
    $file_path = '../data/' . $_GET['category'] . '.xml';
    $xml->load($file_path);

    $items = $xml->getElementsByTagName('items')->item(0);
    $all_items = $items->getElementsByTagName('item');
    $new_cart_item = '';
    foreach ($all_items as $item) {
        if ($item->getElementsByTagName('item-no')->item(0)->nodeValue == $_GET['item_no']) {
            $new_cart_item = $_GET['item_no'] . '_' . $item->getElementsByTagName('name')->item(0)->nodeValue . '_' . $item->getElementsByTagName('price')->item(0)->nodeValue . '_' . $item->getElementsByTagName('category')->item(0)->nodeValue;
            echo 'Added ' . $item->getElementsByTagName('name')->item(0)->nodeValue . ' to cart';
        }
    }

    $content = file($filename);
    if (isset($content[0]) == true) {
        $new_cart_item = $content[0] . '*' . $new_cart_item;
    }
    $fp = fopen($filename, 'w');
    fputs($fp, $new_cart_item);
    fclose($fp);

?>