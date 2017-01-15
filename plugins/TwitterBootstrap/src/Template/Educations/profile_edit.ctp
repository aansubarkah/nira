<?php
echo $this->Form->create($education, [
    'id' => 'education',
    'data-toggle' => 'validator'
]);

echo '<div class="form-group">';
echo $this->Form->select('level_id', $levelOptions, [
    'class' => 'form-control',
    'value' => $education['education']['level_id']
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('college', [
    'label' => false,
    'class' => 'form-control typeahead',
    'placeholder' => 'Institusi Pendidikan',
    'autocomplete' => 'off',
    'value' => $education['education']['college']['name'],
    'required',
    'id' => 'college',
    'data-error' => 'Institusi Pendidikan harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo $this->Form->hidden('college_id', [
    'id' => 'college_id',
    'value' => $education['education']['college']['id']
]);
echo $this->Form->hidden('college_name', [
    'id' => 'college_name',
    'value' => $education['education']['college']['name']
]);

echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('held', [
    'label' => false,
    'class' => 'form-control datepicker',
    'placeholder' => 'Tanggal Ijasah (Jika dikosongi akan digunakan tanggal hari ini)',
    'autocomplete' => 'off',
    'id' => 'held',
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('number', [
    'label' => false,
    'class' => 'form-control',
    'placeholder' => 'Nomor Ijasah',
    'autocomplete' => 'off',
    'required',
    'id' => 'number',
    'data-error' => 'Nomor Ijasah harus diisi'
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

    // data source for colleges
    var collegesData = [];
<?php
foreach($collegesOptions as $key=>$value)
{
?>
    collegesData.push({
        id: "<?php echo $key; ?>",
        name: "<?php echo $value; ?>"
    });
<?php
}
?>
    // typeahead autocomplete for colleges
    var $college = $('.typeahead');
    $college.typeahead({
        source: collegesData
    });
    $college.change(function() {
        var current = $college.typeahead('getActive');
        // if value exist on collegesData
        if(current) {
            // if collegesData as same as text inputed
            if(current.name == $college.val()) {
                console.log(current.name);
                $('#college_id').val(current.id);
                $('#college_name').val(current.name);
            } else {
                $('#college_id').val(0);
                $('#college_name').val($college.val());
            }
        } else {
            $('#college_id').val(0);
            $('#college_name').val('');
        }
    });

    // simply validating form
    $('#education').validator();
});
</script>
