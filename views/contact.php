<?php

/** @var $this \app\core\View */
/** @var $modal \app\models\ContactForm */
$this->title = 'Contact';

use app\core\form\TextareaField;
?>
<h1>Contact us</h1>

<style>
    .is-invalid {
        border-color: red;
    }

    .invalid-feedback {
        color: red;
    }
</style>

<?php $form = \app\core\form\Form::begin('', 'post') ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php \app\core\form\Form::end() ?>