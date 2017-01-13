<?php
echo $this->Form->create($profile, [
    'id' => 'profile',
    'data-toggle' => 'validator'
]);

echo '<div class="form-group">';
echo $this->Form->text('name', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Nama',
    'id' => 'name',
    'required',
    'autocomplete' => 'off',
    'data-error' => 'Nama harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('fullname', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Nama Lengkap Beserta Gelar',
    'id' => 'fullname',
    'required',
    'autocomplete' => 'off',
    'data-error' => 'Nama Lengkap harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('nik', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'NIK (Nomor Induk Kependudukan)',
    'id' => 'nik',
    'required',
    'autocomplete' => 'off',
    'data-error' => 'NIK harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('birthplace', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Tempat Lahir',
    'id' => 'birthplace',
    'required',
    'autocomplete' => 'off',
    'data-error' => 'Tempat Lahir harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('birthday', [
    'label' => false,
    'class' => 'form-control datepicker',
    'placeholder' => 'Tanggal Lahir',
    'default' => date('d-m-Y'),
    'id' => 'birthday',
    'value' => $birth
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

$options = [0 => 'Wanita', 1 => 'Pria'];
echo '<div class="form-group">';
echo $this->Form->select('sex', $options, [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Jenis Kelamin',
    'id' => 'sex',
    'required',
    'autocomplete' => 'off',
    'default' => $profile['sex'],
    'data-error' => 'Jenis Kelamin harus dipilih'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

$options = [0 => 'Lajang', 1 => 'Menikah'];
echo '<div class="form-group">';
echo $this->Form->select('marital', $options, [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Status',
    'id' => 'marital',
    'required',
    'autocomplete' => 'off',
    'default' => $profile['marital'],
    'data-error' => 'Status harus dipilih'
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

echo $this->Html->css('bootstrap-datepicker3.min');
echo $this->Html->script([
    'bootstrap-datepicker.min',
    'bootstrap-datepicker.id.min',
    'validator.min'
]);
?>
<script>
$(function() {
    $('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
        autoclose: true,
        language: 'id',
        startDate: 0
    });

    // simply validating form
    $('#profile').validator();
});
</script>
