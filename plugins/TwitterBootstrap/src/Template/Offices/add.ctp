<?php
echo $this->Form->create($office, [
    'id' => 'office',
    'data-toggle' => 'validator'
]);

echo '<div class="form-group">';
echo $this->Form->select('regency_id', $regenciesOptions, [
    'class' => 'form-control'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->select('parent_id', $officesOptions, [
    'class' => 'form-control'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->select('category_id', $categoriesOptions, [
    'class' => 'form-control'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('name', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Nama',
    'autocomplete' => 'off',
    'id' => 'name',
    'required',
    'data-error' => 'Nama harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('number', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Kode',
    'autocomplete' => 'off',
    'id' => 'number',
    'required',
    'data-error' => 'Kode harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('address', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Alamat',
    'autocomplete' => 'off',
    'id' => 'address',
    'required',
    'data-error' => 'Alamat harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('phone', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Telepon',
    'autocomplete' => 'off',
    'id' => 'phone',
    'required',
    'data-error' => 'Telepon harus diisi'
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
    $('#office').validator();
});
</script>
