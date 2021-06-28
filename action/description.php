<?php

    session_start();
    $xml = new DOMDocument();
    $file_path = '../data/' . $_GET['category'] . '.xml';
    $xml->load($file_path);

    $items = $xml->getElementsByTagName('items')->item(0);
    $all_items = $items->getElementsByTagName('item');
    foreach ($all_items as $item) {
        if ($item->getElementsByTagName('item-no')->item(0)->nodeValue == $_GET['item_no']) {
            echo '<ul>';
            echo '<span>Description</span>';
            $description = $item->getElementsByTagName('description');
            for ($i = 1; $i <= $description->length; $i++) {
                echo '<li>' . $description->item($i - 1)->nodeValue . '</li>';
            }
            echo '</ul>';
            return;
        }
    }

?>