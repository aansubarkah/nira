<?php
echo $this->Form->create($company, [
    'id' => 'company',
    'data-toggle' => 'validator'
]);

echo '<div class="form-group">';
echo $this->Form->select('category_id', $categoriesOptions, [
    'class' => 'form-control',
    'value' => $company['company']['category_id']
]);
echo '<div class="help-block with-errors"></div>';
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->text('company', [
    'label' => false,
    'class' => 'form-control typeahead',
    'placeholder' => 'Institusi/Lembaga',
    'autocomplete' => 'off',
    'value' => $company['company']['name'],
    'required',
    'id' => 'comp',
    'data-error' => 'Institusi/Lembaga harus diisi'
]);
echo '<div class="help-block with-errors"></div>';
echo $this->Form->hidden('company_id', [
    'id' => 'company_id',
    'value' => $company['company']['id']
]);
echo $this->Form->hidden('company_name', [
    'id' => 'company_name',
    'value' => $company['company']['name']
]);

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
    var companiesData = [];
<?php
foreach($companiesOptions as $key=>$value)
{
?>
    companiesData.push({
        id: "<?php echo $key; ?>",
        name: "<?php echo $value; ?>"
    });
<?php
}
?>
    // typeahead autocomplete for colleges
    var $company = $('.typeahead');
    $company.typeahead({
        source: companiesData
    });
    $company.change(function() {
        var current = $company.typeahead('getActive');
        // if value exist on companiesData
        if(current) {
            // if companiesData as same as text inputed
            if(current.name == $company.val()) {
                console.log(current.name);
                $('#company_id').val(current.id);
                $('#company_name').val(current.name);
            } else {
                $('#company_id').val(0);
                $('#company_name').val($company.val());
            }
        } else {
            $('#company_id').val(0);
            $('#company_name').val('');
        }
    });

    // simply validating form
    $('#company').validator();
});
</script>
