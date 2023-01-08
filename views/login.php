<?php 
use ho_b7\phpmvc\form\Form;

/** 
 * User: Houdaifa (tut: TheCodeHolic) 
 * Date : 03/01/2023
 * App: PHP MVC Framework
 *
*/

/** @var $model \app\models\User  */

?>

<h1>Login Page</h1>

<?php $form = Form::begin('', 'post') ?>

    <?= $form->InputField($model, 'email')->emailField(); ?>

    <?= $form->InputField($model, 'password')->passwordField(); ?>

    <button type="submit" class="btn btn-primary">Submit</button>

<?= Form::end() ?>

