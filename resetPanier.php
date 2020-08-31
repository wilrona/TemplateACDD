<?php

session_start();


$count = 0;
if (isset($_SESSION['panier'])) {
  $produits = $_SESSION['panier'];
  $count = count($produits);
}

echo $count;
die();
