<div class="login-panel panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Login</h3>
    </div><!--/.panel-heading-->
    <div class="panel-body">
<?php
echo $this->Form->create(NULL, [
'url' => [
'controller' => 'users',
'action' => 'login'
],
'id' => 'user',
'data-toggle' => 'validator'
]);

echo '<fieldset>';

echo '<div class="form-group">';
echo $this->Form->text('username', [
'autofocus' => true,
'label' => false,
'class' => 'form-control',
'placeholder' => 'Username'
]);
echo '</div>';

echo '<div class="form-group">';
echo $this->Form->input('password', [
'type' => 'password',
'label' => false,
'class' => 'form-control',
'placeholder' => 'Password'
]);
echo '</div>';

echo $this->Form->button('Login', [
'type' => 'submit',
'class' => 'btn btn-lg btn-primary btn-block'
]);

echo $this->Form->end();

echo '</fieldset>';
?>
    </div><!--/.panel-body-->
</div><!--/.login-panel-->
