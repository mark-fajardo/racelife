<?php

    session_start();
    
    $shirts_xml = new DOMDocument();
    $shirts_xml->load('../data/shirts.xml');
    $shirts_items = $shirts_xml->getElementsByTagName('items')->item(0);
    $all_shirts = $shirts_items->getElementsByTagName('item');

    echo '<div id="shirts-container" class="tabcontent" style="display: none">';
    foreach ($all_shirts as $item) {
        $id = $item->getElementsByTagName('category')->item(0)->nodeValue . $item->getElementsByTagName('item-no')->item(0)->nodeValue;
        $descId = $id . '-desc';
        $imgId = $id . '-img';
        echo '<div id="' . $id . '" onmouseout="hideDesc(\'' . $id . '\')" onmouseover="showDesc(\'' . $id . '\', ' . $item->getElementsByTagName('item-no')->item(0)->nodeValue . ', \'' . $item->getElementsByTagName('category')->item(0)->nodeValue . '\')" style="margin: 10px; display: inline-block; width: 300px; min-height: 520px; background-color: white; padding: 20px; border-radius: 4px; border: 1px solid #ccc; border-color: lightgrey; font-family: \'Segoe UI\'; color: #404040">';
        echo '<div id="' . $descId . '" class="desc-container"></div>';
        echo '<div id="' . $imgId . '" style="width: 260px; height: 260px; padding: 20px; background-color: #F5F5F5; text-align: center">';
        echo '<img src="'. $item->getElementsByTagName('img')->item(0)->nodeValue .'" style="max-height: 260px; max-width: 260px; margin: auto;">';
        echo '</div>';

        echo '<div style="width: 260px; min-height: 150px; margin: auto">';
        echo '<h3 class="item-name">' . $item->getElementsByTagName('name')->item(0)->nodeValue . '</h3>';
        echo '<span>₱</span> <span>' . $item->getElementsByTagName('price')->item(0)->nodeValue . '</span><span>.00</span> <br>';
        echo '<span>Size:</span> <span>' . $item->getElementsByTagName('size')->item(0)->nodeValue . '</span> <span>Color:</span> <span>' . $item->getElementsByTagName('color')->item(0)->nodeValue . '</span> <br>';
        echo '<span>Quantity: </span> <span>' . $item->getElementsByTagName('quantity')->item(0)->nodeValue . '</span><span>pc/s</span> <br>';
        echo '</div>';

        echo '<button onclick="addToCart(' . $item->getElementsByTagName('item-no')->item(0)->nodeValue . ', \'' . $item->getElementsByTagName('category')->item(0)->nodeValue . '\')" style="margin-top: 10px; border-radius: 8px; background-color: #4CAF50; border: none; color: white; padding: 10px 15px; text-align: center; text-decoration: none; cursor: pointer;">Add To Cart</button>';
        echo '</div>';
    }
    echo '</div>';

    $shorts_xml = new DOMDocument();
    $shorts_xml->load('../data/shorts.xml');
    $shorts_items = $shorts_xml->getElementsByTagName('items')->item(0);
    $all_shorts = $shorts_items->getElementsByTagName('item');
    echo '<div id="shorts-container" class="tabcontent" style="display: none">';
    foreach ($all_shorts as $item) {
        $id = $item->getElementsByTagName('category')->item(0)->nodeValue . $item->getElementsByTagName('item-no')->item(0)->nodeValue;
        $descId = $id . '-desc';
        $imgId = $id . '-img';
        echo '<div id="' . $id . '" onmouseout="hideDesc(\'' . $id . '\')" onmouseover="showDesc(\'' . $id . '\', ' . $item->getElementsByTagName('item-no')->item(0)->nodeValue . ', \'' . $item->getElementsByTagName('category')->item(0)->nodeValue . '\')" style="margin: 10px; display: inline-block; width: 300px; min-height: 520px; background-color: white; padding: 20px; border-radius: 4px; border: 1px solid #ccc; border-color: lightgrey; font-family: \'Segoe UI\'; color: #404040">';
        echo '<div id="' . $descId . '" class="desc-container"></div>';
        echo '<div id="' . $imgId . '" style="width: 260px; height: 260px; padding: 20px; background-color: #F5F5F5; text-align: center">';
        echo '<img src="'. $item->getElementsByTagName('img')->item(0)->nodeValue .'" style="max-height: 260px; max-width: 260px; margin: auto;">';
        echo '</div>';

        echo '<div style="width: 260px; min-height: 150px; margin: auto">';
        echo '<h3 class="item-name">' . $item->getElementsByTagName('name')->item(0)->nodeValue . '</h3>';
        echo '<span>₱</span> <span>' . $item->getElementsByTagName('price')->item(0)->nodeValue . '</span><span>.00</span> <br>';
        echo '<span>Size:</span> <span>' . $item->getElementsByTagName('size')->item(0)->nodeValue . '</span> <span>Color:</span> <span>' . $item->getElementsByTagName('color')->item(0)->nodeValue . '</span> <br>';
        echo '<span>Quantity: </span> <span>' . $item->getElementsByTagName('quantity')->item(0)->nodeValue . '</span><span>pc/s</span> <br>';
        echo '</div>';

        echo '<button onclick="addToCart(' . $item->getElementsByTagName('item-no')->item(0)->nodeValue . ', \'' . $item->getElementsByTagName('category')->item(0)->nodeValue . '\')" style="margin-top: 10px; border-radius: 8px; background-color: #4CAF50; border: none; color: white; padding: 10px 15px; text-align: center; text-decoration: none; cursor: pointer;">Add To Cart</button>';
        echo '</div>';
    }
    echo '</div>';
    
    $shoes_xml = new DOMDocument();
    $shoes_xml->load('../data/shoes.xml');
    $shoes_items = $shoes_xml->getElementsByTagName('items')->item(0);
    $all_shoes = $shoes_items->getElementsByTagName('item');
    echo '<div id="shoes-container" class="tabcontent" style="display: none">';
    foreach ($all_shoes as $item) {
        $id = $item->getElementsByTagName('category')->item(0)->nodeValue . $item->getElementsByTagName('item-no')->item(0)->nodeValue;
        $descId = $id . '-desc';
        $imgId = $id . '-img';
        echo '<div id="' . $id . '" onmouseout="hideDesc(\'' . $id . '\')" onmouseover="showDesc(\'' . $id . '\', ' . $item->getElementsByTagName('item-no')->item(0)->nodeValue . ', \'' . $item->getElementsByTagName('category')->item(0)->nodeValue . '\')" style="margin: 10px; display: inline-block; width: 300px; min-height: 520px; background-color: white; padding: 20px; border-radius: 4px; border: 1px solid #ccc; border-color: lightgrey; font-family: \'Segoe UI\'; color: #404040">';
        echo '<div id="' . $descId . '" class="desc-container"></div>';
        echo '<div id="' . $imgId . '" style="width: 260px; height: 260px; padding: 20px; background-color: #F5F5F5; text-align: center">';
        echo '<img src="'. $item->getElementsByTagName('img')->item(0)->nodeValue .'" style="max-height: 260px; max-width: 260px; margin: auto;">';
        echo '</div>';

        echo '<div style="width: 260px; min-height: 150px; margin: auto">';
        echo '<h3 class="item-name">' . $item->getElementsByTagName('name')->item(0)->nodeValue . '</h3>';
        echo '<span>₱</span> <span>' . $item->getElementsByTagName('price')->item(0)->nodeValue . '</span><span>.00</span> <br>';
        echo '<span>Size:</span> <span>' . $item->getElementsByTagName('size')->item(0)->nodeValue . '</span> <span>Color:</span> <span>' . $item->getElementsByTagName('color')->item(0)->nodeValue . '</span> <br>';
        echo '<span>Quantity: </span> <span>' . $item->getElementsByTagName('quantity')->item(0)->nodeValue . '</span><span>pc/s</span> <br>';
        echo '</div>';

        echo '<button onclick="addToCart(' . $item->getElementsByTagName('item-no')->item(0)->nodeValue . ', \'' . $item->getElementsByTagName('category')->item(0)->nodeValue . '\')" style="margin-top: 10px; border-radius: 8px; background-color: #4CAF50; border: none; color: white; padding: 10px 15px; text-align: center; text-decoration: none; cursor: pointer;">Add To Cart</button>';
        echo '</div>';
    }
    echo '</div>';

?>