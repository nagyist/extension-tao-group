<?include(TAO_TPL_PATH . 'header.tpl')?>

<?include('subjects.tpl')?>

<?include('tests.tpl')?>

<div class="main-container">
	<div id="form-title" class="ui-widget-header ui-corner-top ui-state-default">
		<?=get_data('formTitle')?>
	</div>
	<div id="form-container" class="ui-widget-content ui-corner-bottom ui-state-default">
		<?=get_data('myForm')?>
	</div>
</div>

<?include(TAO_TPL_PATH . 'footer.tpl');?>