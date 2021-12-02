<?php
/* Smarty version 3.1.33, created on 2018-12-12 15:37:59
  from '/var/www/html/elite/app/app/application/views/questoes/tipos/unica.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c112b57e3c564_71521484',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4dab953e9a24ca65361f5eaebb8b9338c855aa4f' => 
    array (
      0 => '/var/www/html/elite/app/app/application/views/questoes/tipos/unica.tpl',
      1 => 1544629078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c112b57e3c564_71521484 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="radio radio-inline alternativa">
	<label>
		<input type="radio" name="questao_<?php echo $_smarty_tpl->tpl_vars['o']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['a']->value;?>
">
		<i class="helper"></i><?php echo $_smarty_tpl->tpl_vars['a']->value;?>

	<?php if ($_smarty_tpl->tpl_vars['a']->value == 'Outro') {?>
		<input type="text" id="questao_<?php echo $_smarty_tpl->tpl_vars['o']->value;?>
_outro" name="questao_<?php echo $_smarty_tpl->tpl_vars['o']->value;?>
_outro" value="" class="form-control outro" autocomplete="off">
	<?php }?>
	</label>
</div><?php }
}
