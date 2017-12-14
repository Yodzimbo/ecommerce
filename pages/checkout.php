<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 13.12.2017
 * Time: 14:21
 */

Login::restrictFront();

$objForm = new Form();

$objValid = new Validation($objForm);

if($objForm->isPost('first_name'))
{
    $objValid->_expected = array(
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'town',
        'county',
        'post_code',
        'country',
        'email'
    );
    $objValid->_required = array(
        'first_name',
        'last_name',
        'address_1',
        'town',
        'county',
        'post_code',
        'country',
        'email'
    );

    $objValid->_special = array(
            'email' => 'email'
    );

    if($objValid->isValid())
    {

    }
}

require_once '_header.php'; ?>

<h1>Dane adresowe</h1>

<p>Proszę wprowadzić swoje dane i nacisnąć <span>Dalej</span></p>

<form action="" method="post">
    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
        <tr>
            <th><label for="first_name">Imię: *</label> </th>
            <td>
                <?php echo $objValid->validate('first_name'); ?>
                <input type="text" name="first_name" id="first_name" class="fld" value="<?php echo $objForm->stickyText('first_name'); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="last_name">Nazwisko: *</label> </th>
            <td>
                <?php echo $objValid->validate('last_name'); ?>
                <input type="text" name="last_name" id="last_name" class="fld" value="<?php echo $objForm->stickyText('last_name'); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="address_1">Adres: *</label> </th>
            <td>
                <?php echo $objValid->validate('address_1'); ?>
                <input type="text" name="address_1" id="address_1" class="fld" value="<?php echo $objForm->stickyText('address_1'); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="address_2">Adres linia2: </label> </th>
            <td>
                <input type="text" name="address_2" id="address_2" class="fld" value="<?php echo $objForm->stickyText('address_2'); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="town">Town: *</label> </th>
            <td>
                <?php echo $objValid->validate('town'); ?>
                <input type="text" name="town" id="town" class="fld" value="<?php echo $objForm->stickyText('town'); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="county">Województwo: *</label> </th>
            <td>
                <?php echo $objValid->validate('county'); ?>
                <input type="text" name="county" id="county" class="fld" value="<?php echo $objForm->stickyText('county'); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="post_code">Kod pocztowy: *</label> </th>
            <td>
                <?php echo $objValid->validate('post_code'); ?>
                <input type="text" name="post_code" id="post_code" class="fld" value="<?php echo $objForm->stickyText('post_code'); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="country">Kraj: *</label> </th>
            <td>
                <?php echo $objValid->validate('country'); ?>
                <?php echo $objForm->getCountriesSelect();?>
            </td>
        </tr>
        <tr>
            <th><label for="email">Email: *</label> </th>
            <td>
                <?php echo $objValid->validate('email'); ?>
                <input type="text" name="email" id="email" class="fld" value="<?php echo $objForm->stickyText('email'); ?>" />
            </td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td>
                <label for="btn" class="sbm sbm_blue fld_l">
                    <input type="submit" id="btn" class="fld" value="Next" />
                </label>
            </td>
        </tr>
    </table>
</form>

<?php require_once '_footer.php'; ?>