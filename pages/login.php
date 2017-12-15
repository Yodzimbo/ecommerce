<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 14.12.2017
 * Time: 22:21
 */

if(Login::isLogged(Login::$_login_front))
{
    Helper::redirect(Login::$_dashboard_front);
}

$objForm = new Form();
$objValid = new Validation($objForm);
$objUser = new User();

//login form
if($objForm->isPost('login_email'))
{
    if($objUser->isUser($objForm->getPost('login_email'), $objForm->getPost('login_password')))
    {
        Login::loginFront($objUser->_id, Url::getReferrerUrl());
    } else {
        $objValid->add2Errors('login');
    }
}

//registration form
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
        'email',
        'password',
        'confirm_password'
    )
    ;$objValid->_required = array(
        'first_name',
        'last_name',
        'address_1',
        'town',
        'county',
        'post_code',
        'country',
        'email',
        'password',
        'confirm_password'
    );

    $objValid->_special = array(
        'email' => 'email'
    );

    $objValid->_post_remove = array(
        'confirm_password'
    );

    $objValid->_post_format = array(
        'password' => 'password'
    );

//    password validate
    $pass_1 = $objForm->getPost('password');
    $pass_2 = $objForm->getPost('confirm_password');

    if(!empty($pass_1) && !empty($pass_2) && $pass_1 != $pass_2)
    {
        $objValid->add2Errors('password_mismatch');
    }

    if($objValid->isValid())
    {
//        add hash for activating account
        $objValid->_post['hash'] = mt_rand().date('YmdHis').mt_rand();
//        add registration date
        $objValid->_post['date'] = Helper::setDate();

        if($objUser->addUser($objValid->_post, $objForm->getPost('password')))
        {
            Helper::redirect('/?page=registered');
        } else {
            Helper::redirect('/?page=registered-failed');
        }
    }
}

require_once ('_header.php');

?>

<h1>Logowanie</h1>

<form action="" method="post">
    <table cellspacing="0" cellpadding="0" border="0" class="tbl_insert">
        <tr>
            <th>
                <label for="login_email">Login: </label>
            </th>
            <td>
                <?php echo $objValid->validate('login'); ?>
                <input type="text" name="login_email" id="login_email" class="fld" value="" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="login_password">Hasło: </label>
            </th>
            <td>
                <input type="password" name="login_password" id="login_password" class="fld" value="" />
            </td>
        </tr>
        <tr>
            <th>
                &#160;
            </th>
            <td>
                <label for="btn_login" class="sbm sbm_blue fl_l">
                    <input type="submit" id="btn_login" class="btn" value="Login" />
                </label>
            </td>
        </tr>
    </table>
</form>

<div class="dev br_td">&#160;</div>
<h3>Nie jesteś jeszcze zarejestrowany?</h3>

<form action="" method="post">
    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
        <tr>
            <th>
                <label for="first_name">Imię: *</label>
            </th>
            <td>
                <?php echo $objValid->validate('first_name'); ?>
                <input type="text" name="first_name" id="first_name" class="fld" value="<?php $objForm->stickyText('first_name'); ?>" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="last_name">Nazwisko: *</label>
            </th>
            <td>
                <?php echo $objValid->validate('last_name'); ?>
                <input type="text" name="last_name" id="last_name" class="fld" value="<?php $objForm->stickyText('last_name'); ?>" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="address_1">Adres 1: *</label>
            </th>
            <td>
                <?php echo $objValid->validate('address_1'); ?>
                <input type="text" name="address_1" id="address_1" class="fld" value="<?php $objForm->stickyText('address_1'); ?>" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="address_2">Adres 2: </label>
            </th>
            <td>
                <?php echo $objValid->validate('address_2'); ?>
                <input type="text" name="address_2" id="address_2" class="fld" value="<?php $objForm->stickyText('address_2'); ?>" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="town">Miasto: *</label>
            </th>
            <td>
                <?php echo $objValid->validate('town'); ?>
                <input type="text" name="town" id="town" class="fld" value="<?php $objForm->stickyText('town'); ?>" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="county">Województwo: *</label>
            </th>
            <td>
                <?php echo $objValid->validate('county'); ?>
                <input type="text" name="county" id="county" class="fld" value="<?php $objForm->stickyText('county'); ?>" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="post_code">kod pocztowy: *</label>
            </th>
            <td>
                <?php echo $objValid->validate('post_code'); ?>
                <input type="text" name="post_code" id="post_code" class="fld" value="<?php $objForm->stickyText('post_code'); ?>" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="country">Kraj: *</label>
            </th>
            <td>
                <?php echo $objValid->validate('country'); ?>
                <?php echo $objForm->getCountriesSelect(175); ?>
            </td>
        </tr>
        <tr>
            <th>
                <label for="email">Email: *</label>
            </th>
            <td>
                <?php echo $objValid->validate('email'); ?>
                <input type="email" name="email" id="email" class="fld" value="<?php $objForm->stickyText('email'); ?>" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="password">Hasło: *</label>
            </th>
            <td>
                <?php echo $objValid->validate('password'); ?>
                <?php echo $objValid->validate('mismatch_password'); ?>
                <input type="password" name="password" id="password" class="fld" value="" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="confirm_password">Potwierdź hasło: *</label>
            </th>
            <td>
                <?php echo $objValid->validate('confirm_password'); ?>
                <input type="password" name="confirm_password" id="confirm_password" class="fld" value="" />
            </td>
        </tr>
        <tr>
            <th>
                &#160;
            </th>
            <td>
                <label for="btn" class="sbm sbm_blue fl_l">
                    <input type="submit" id="btn" class="btn" value="Rejestruj" />
                </label>
            </td>
        </tr>

    </table>
</form>

<?php require_once ('_footer.php'); ?>
