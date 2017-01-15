<?php
echo $this->Form->create($office, [
    'id' => 'office',
    'data-toggle' => 'validator'
]);

echo '<div class="form-group">';
echo $this->Form->select('office_id', $officesOptions, [
    'class' => 'form-control'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('started', [
    'label' => false,
    'class' => 'form-control datepicker',
    'placeholder' => 'Tanggal Mulai (Jika dikosongi akan digunakan tanggal hari ini)',
    'autocomplete' => 'off',
    'id' => 'started',
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('ended', [
    'label' => false,
    'class' => 'form-control datepicker',
    'placeholder' => 'Tanggal Berakhir (Dapat dikosongkan)',
    'autocomplete' => 'off',
    'id' => 'ended',
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
    $('#office').validator();
});
</script>
