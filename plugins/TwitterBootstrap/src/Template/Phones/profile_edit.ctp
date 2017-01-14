<?php
echo $this->Form->create($phone, [
    'id' => 'phone',
    'data-toggle' => 'validator'
]);

echo '<div class="form-group">';
echo $this->Form->text('name', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Nomor Telepon',
    'autocomplete' => 'off',
    'id' => 'name',
    'required',
    'data-error' => 'Nomor telepon harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->select('type_id', $typesOptions, [
    'class' => 'form-control',
    'value' => $phone['type_id']
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
    $('#phone').validator();
});
</script>
