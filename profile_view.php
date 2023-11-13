
<?php require 'db_connect.php';
include 'config_session.php'  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Shop Name</title>
    <script defer src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<div class="shop_menu_grid">
        <div class="my_store_image"></div>
        <div class="shop_name_title">
            <h1 id='shop_name_text'>
                <?=htmlspecialchars($userInfo->shopname?? ""); ?>
            </h1>
                <div class="shop_owner">
                    <a href="">
                        <span>Designs by</span>
                        <span class="shop_owner_name">Myo</span>
                    </a>
                </div>
            </h1>
        </div>
    </div>
</body>
</html>
