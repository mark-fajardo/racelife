<?php

    session_start();
    $filename = '../data/cart.txt';
    $content = file($filename);
    $cart = explode('*', $content[0]);

    $xml_shirts = new DOMDocument();
    $file_path_shirts = '../data/shirts.xml';
    $xml_shirts->load($file_path_shirts);
    $items = $xml_shirts->getElementsByTagName('items')->item(0);
    $all_shirts = $items->getElementsByTagName('item');
    
    $xml_shorts = new DOMDocument();
    $file_path_shorts = '../data/shorts.xml';
    $xml_shorts->load($file_path_shorts);
    $items = $xml_shorts->getElementsByTagName('items')->item(0);
    $all_shorts = $items->getElementsByTagName('item');
    
    $xml_shoes = new DOMDocument();
    $file_path_shoes = '../data/shoes.xml';
    $xml_shoes->load($file_path_shoes);
    $items = $xml_shoes->getElementsByTagName('items')->item(0);
    $all_shoes = $items->getElementsByTagName('item');

    for ($i = 0; $i < count($cart); $i++) {
        $item = explode('_', $cart[$i]);

        if ($item[3] == 'shirts') {
            $xml = $xml_shirts;
            $file_path = $file_path_shirts;
            $all_items = $all_shirts;
        } else if ($item[3] == 'shorts') {
            $xml = $xml_shorts;
            $file_path = $file_path_shorts;
            $all_items = $all_shorts;
        } else {
            $xml = $xml_shoes;
            $file_path = $file_path_shoes;
            $all_items = $all_shoes;
        }

        foreach ($all_items as $shop_item) {
            if ($shop_item->getElementsByTagName('item-no')->item(0)->nodeValue == $item[0]) {
                $shop_item->getElementsByTagName('quantity')->item(0)->nodeValue = $shop_item->getElementsByTagName('quantity')->item(0)->nodeValue - 1;
                $xml->save($file_path);
            }
        }
    }

    $fp = fopen($filename, 'w');
    fputs($fp, '');
    fclose($fp);
?>