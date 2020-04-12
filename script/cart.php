<?php
    if (isset($_POST['ID'])){
        $ID = $_POST['ID'];
        $chosen_quantity = $_POST['chosen_quantity'];
        $section = $_POST['section'];
        
        $result['ID'] = $ID;
        $result['chosen_quantity'] = $chosen_quantity;
        $result['section'] = $section;
        echo json_encode($result);
    }
?>