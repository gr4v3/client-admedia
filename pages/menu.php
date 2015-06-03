<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="menu-container">
    <div class="avatar">
        <img src="http://img.admedia.pt/img-avatar/avatar.jpg" alt="admedia avatar">
    </div>
    <div class="name"><?php echo $client->user->firstname; ?> <?php echo $client->user->lastname; ?></div>
    <div class="options">
        <div class="item"><a href="javascript:;">Definições</a></div>
        <div class="item"><a href="javascript:;">Dados Pessoais</a></div>
        <div class="item"><a href="javascript:;">Convidar Amigos</a></div>
        <div class="item"><a href="javascript:;">Ajuda</a></div>
        <div class="item"><a href="javascript:;">Sair</a></div>
    </div>
</div>