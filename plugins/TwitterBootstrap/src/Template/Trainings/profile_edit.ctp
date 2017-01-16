<?php
echo $this->Form->create($training, [
    'id' => 'training',
    'data-toggle' => 'validator'
]);

echo '<div class="form-group">';
echo $this->Form->text('name', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Nama Pelatihan',
    'autocomplete' => 'off',
    'value' => $training['training']['name'],
    'required',
    'id' => 'name',
    'data-error' => 'Nama Pelatihan harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->textarea('description', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Deskripsi Pelatihan (Dapat dikosongkan)',
    'autocomplete' => 'off',
    'value' => $training['training']['description'],
    'id' => 'description'
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('issuer', [
    'label' => false,
    'class' => 'form-control typeahead',
    'placeholder' => 'Lembaga Penyelenggara',
    'value' => $training['training']['issuer']['name'],
    'autocomplete' => 'off',
    'required',
    'id' => 'issuer',
    'data-error' => 'Lembaga Penyelenggara harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo $this->Form->hidden('issuer_id', [
    'id' => 'issuer_id',
    'value' => $training['training']['issuer']['id']
]);
echo $this->Form->hidden('issuer_name', [
    'id' => 'issuer_name',
    'value' => $training['training']['issuer']['name']
]);

echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('started', [
    'label' => false,
    'class' => 'form-control datepicker',
    'placeholder' => 'Tanggal Mulai Pelatihan (Jika dikosongi akan digunakan tanggal hari ini)',
    'autocomplete' => 'off',
    'id' => 'started',
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('ended', [
    'label' => false,
    'class' => 'form-control datepicker',
    'placeholder' => 'Tanggal Berakhir Pelatihan (Jika dikosongi akan digunakan tanggal hari ini)',
    'autocomplete' => 'off',
    'id' => 'ended',
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('held', [
    'label' => false,
    'class' => 'form-control datepicker',
    'placeholder' => 'Tanggal Sertifikat Pelatihan (Jika dikosongi akan digunakan tanggal hari ini)',
    'autocomplete' => 'off',
    'id' => 'held',
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
    'bootstrap3-typeahead.min',
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

    // data source for issuers
    var issuersData = [];
<?php
foreach($issuersOptions as $key=>$value)
{
?>
    issuersData.push({
        id: "<?php echo $key; ?>",
        name: "<?php echo $value; ?>"
    });
<?php
}
?>
    // typeahead autocomplete for issuers
    var $issuer = $('.typeahead');
    $issuer.typeahead({
        source: issuersData
    });
    $issuer.change(function() {
        var current = $issuer.typeahead('getActive');
        // if value exist on issuersData
        if(current) {
            // if issuersData as same as text inputed
            if(current.name == $issuer.val()) {
                console.log(current.name);
                $('#issuer_id').val(current.id);
                $('#issuer_name').val(current.name);
            } else {
                $('#issuer_id').val(0);
                $('#issuer_name').val($issuer.val());
            }
        } else {
            $('#issuer_id').val(0);
            $('#issuer_name').val('');
        }
    });

    // simply validating form
    $('#training').validator();
});
</script>
