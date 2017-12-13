<?php $objBasket = new Basket(); ?>
<h2>Twój koszyk</h2>
<dl id="basket_left">
    <dt>Ilość produktów:</dt>
    <dd class="bl_ti"><span><?php echo $objBasket->_number_of_items; ?></span></dd>
    <dt>Cena netto:</dt>
    <dd class="bl_st">&pound;<span><?php echo number_format($objBasket->_sub_total, 2); ?></span></dd>
    <dt>VAT (<span><?php echo $objBasket->_vat_rate; ?></span>%):</dt>
    <dd class="bl_vat">&pound;<span><?php echo number_format($objBasket->_vat, 2); ?></span></dd>
    <dt>Cena całkowita:</dt>
    <dd class="bl_total">&pound;<span><?php echo number_format($objBasket->_total, 2); ?></span></dd>
</dl>
<div class="dev br_td">&#160;</div>
<p><a href="/?page=basket">Podgląd koszyka</a> | <a href="/?page=checkout">Do Kasy</a></p>
<div class="dev br_td">&#160;</div>