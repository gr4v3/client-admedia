<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
$token = $client->user->token;
$categories = request('tag=categories&token='.$token);
$hotels = current($categories->items);
$media = request('tag=media&media=' . $hotels->media_id . '&token='. $token);
 */
$categories = request('tag=categories&token='.$client->user->token);
?>
<div class="container-fluid fullheight">
    <div class="top">
        <div class="header">
            <div class="menu"><i class="fa fa-bars"></i></div>
            <div class="search"><i class="fa fa-search"></i></div>
        </div>
        <div class="plan">
            <div>plan your perfect trip</div>
            <div class="small">try our intelligent planner and create your best vacation</div>
        </div>
    </div>
    <div class="categories">
        <ul>
            <?php
                foreach($categories->items as $item) {
                    if (!empty($item->parent)) continue;
                    $media = request('tag=media&media=' . $item->media_id . '&token='. $client->user->token);
                    $image = $media->item;
                    ?>
                        <li style="background-image: url(<?php echo $image->path . '/img-mobile/' . $image->gallery_id->path . $image->name; ?>);">
                            <div class="title"><?php echo $item->name; ?></div>
                            <div class="description"><?php echo $item->description; ?></div>
                        </li>
                    <?php
                }
            ?>
        </ul>
        
    </div>
</div>