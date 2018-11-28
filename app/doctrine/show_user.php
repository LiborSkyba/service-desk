<?php
// show_product.php <id>
require_once "bootstrap.php";

$id = $argv[1];
$user = $entityManager->find('User', $id);

if ($user === null) {
    echo "No usert found.\n";
    exit(1);
}

echo sprintf("-%s\n", $user->getName());
