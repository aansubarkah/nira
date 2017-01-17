<?php
echo $this->Form->create($address, [
    'id' => 'address',
    'data-toggle' => 'validator'
]);

echo '<div class="form-group">';
echo $this->Form->text('street', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Jalan',
    'autocomplete' => 'off',
    'id' => 'street',
    'value' => $address['address']['street'],
    'required',
    'data-error' => 'Jalan harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('number', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Nomor (Dapat dikosongkan)',
    'autocomplete' => 'off',
    'id' => 'number',
    'value' => $address['address']['number']
]);
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('rt', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'RT (Dapat dikosongkan)',
    'autocomplete' => 'off',
    'id' => 'rt',
    'value' => $address['address']['rt']
]);
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('rw', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'RW (Dapat dikosongkan)',
    'autocomplete' => 'off',
    'id' => 'rw',
    'value' => $address['address']['rw']
]);
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('village', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Desa/Kelurahan (Dapat dikosongkan)',
    'autocomplete' => 'off',
    'id' => 'village',
    'value' => $address['address']['village']
]);
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('district', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Kecamatan',
    'autocomplete' => 'off',
    'id' => 'district',
    'required',
    'value' => $address['address']['district'],
    'data-error' => 'Kecamatan harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('postal', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Kode Pos (Dapat dikosongkan)',
    'autocomplete' => 'off',
    'id' => 'postal',
    'value' => $address['address']['postal']
]);
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->select('regency_id', $regenciesOptions, [
    'class' => 'form-control',
    'value' => $address['address']['regency_id']
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
    $('#address').validator();
});
</script>
