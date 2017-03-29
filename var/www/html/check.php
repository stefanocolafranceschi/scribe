<?php
    $idhdmi = $_POST['idhdmi'];
    $apvkind = $_POST['apvkind'];
    $fpsubaddr = fopen('/srsconfig/subaddress', 'w');
    fwrite($fpsubaddr, $idhdmi*2+$apvkind);
    fclose($fpsubaddr);
?>
