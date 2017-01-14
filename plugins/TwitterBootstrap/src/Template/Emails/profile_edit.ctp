<?php
echo $this->Form->create($email, [
    'id' => 'email',
    'data-toggle' => 'validator'
]);

echo '<div class="form-group">';
echo $this->Form->email('name', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Email',
    'autocomplete' => 'off',
    'id' => 'name',
    'required',
    'data-error' => 'Format Email Tidak Sesuai'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group pull-right">';
echo $this->Form->button('Reset', [
    'type' => 'reset',
    'class' => 'btn btn-default'
]);
echo '&nbsp;';
echo $this->Form->button('Submit', [
    'type' => 'submit',
    'class' => 'btn btn-primary'
]);
echo $this->Form->end();
echo '</div>';

echo $this->Html->script([
    'validator.min'
]);
?>
<script>
$(function() {
    // simply validating form
    $('#email').validator();
});
</script>
