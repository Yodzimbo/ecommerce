<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 14.12.2017
 * Time: 22:21
 */

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

<?php require_once ('_footer.php'); ?>
