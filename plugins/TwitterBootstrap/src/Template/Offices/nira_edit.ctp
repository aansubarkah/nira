<?php
echo $this->Form->create($nira, [
    'id' => 'nira',
    'data-toggle' => 'validator'
]);

echo '<div class="form-group">';
echo $this->Form->text('nira', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'NIRA',
    'autocomplete' => 'off',
    'id' => 'nira',
    'required',
    'data-error' => 'NIRA harus diisi'
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
    $('#nira').validator();
});
</script>
