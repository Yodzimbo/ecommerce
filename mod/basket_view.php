<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 13.12.2017
 * Time: 10:40
 */

require_once '../inc/autoload.php';

$session = Session::getSession('basket');
$objBasket = new Basket();

$out = array();

if(!empty($session))
{
    $objCatalogue = new Catalogue();
    foreach ($session as $key => $value)
    {
        $out[$key] = $objCatalogue->getProduct($key);
    }
}

?>
<?php if (!empty($out)) {?>

        <form action="" method="post" id="frm_basket">
            <table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
                <tr>
                    <th>Nazwa produktu</th>
                    <th class="ta_r col_15">Ilość</th>
                    <th class="ta_r col_15">Cena</th>
                    <th class="ta_r col_15">Usuń</th>
                </tr>

                <?php foreach ($out as $item)
                {?>
                    <tr>
                        <td><?php echo Helper::encodeHTML($item['name']); ?></td>
                        <td><input type="text" name="qty-<?php echo $item['id'];?>" Kwota netto id="qty-<?php echo $item['id'];?>" class="fld_qty" value="<?php echo $session[$item['id']]['qty']; ?>" /></td>
                        <td class="ta_r">Złoty<?php echo number_format($objBasket->itemTotal($item['price'], $session[$item['id']]['qty']), 2); ?></td>
                        <td class="ta_r"><?php echo Basket::removeButton($item['id']); ?></td>
                    </tr>
                <?php } ?>

                <?php if($objBasket->_vat_rate != 0) {?>
                    <tr>
                        <td colspan="2" class="br_td">Kwota netto</td>
                        <td class="ta_r br_td">Złoty<?php echo number_format($objBasket->_sub_total, 2); ?></td>
                        <td class="ta_r br_td">&#160;</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="br_td">VAT <?php echo number_format($objBasket->_vat_rate); ?></td>
                        <td class="ta_r br_td">Złoty: <?php echo number_format($objBasket->_vat, 2); ?></td>
                        <td class="ta_r br_td">&#160;</td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" class="br_td"><strong>Cena całkowita: </strong></td>
                    <td class="ta_r br_td"><strong>Złoty: <?php echo number_format($objBasket->_total, 2); ?></strong></td>
                    <td class="ta_r br_td">&#160;</td>
                </tr>
            </table>

            <div class="dev br_td">$#160;</div>

            <div class="sbm sbm_blue fl_r">
                <a href="/?page=checkout" class="btn">Checkout</a>
            </div>

            <div class="sbm sbm_blue fl_l update_basket">
                <span class="btn">Update</span>
            </div>
        </form>
    <?php } else { ?>
    <p>Twój koszyk jest pusty</p>
<?php } ?>

