<?php 
use ho_b7\phpmvc\form\Form;

/** 
 * User: Houdaifa (tut: TheCodeHolic) 
 * Date : 03/01/2023
 * App: PHP MVC Framework
 *
*/

$title = 'Contact';

?>

<h1>Contact Page</h1>

<?php $form = Form::begin('', 'post') ?>

    <?= $form->InputField($model, 'subject'); ?>

    <?= $form->InputField($model, 'email')->emailField(); ?>

    <?= $form->TextField($model, 'body'); ?>

    <button type="submit" class="btn btn-primary">Submit</button>

<?= Form::end() ?>
