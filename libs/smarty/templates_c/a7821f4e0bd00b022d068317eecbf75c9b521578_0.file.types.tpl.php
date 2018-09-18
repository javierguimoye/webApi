<?php
/* Smarty version 3.1.31, created on 2018-04-28 16:11:31
  from "/Users/Alvaro/Work/Web/Dev/views/types.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5ae4e383b226b9_86618436',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7821f4e0bd00b022d068317eecbf75c9b521578' => 
    array (
      0 => '/Users/Alvaro/Work/Web/Dev/views/types.tpl',
      1 => 1524949891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/header.tpl' => 1,
    'file:layouts/footer.tpl' => 1,
  ),
),false)) {
function content_5ae4e383b226b9_86618436 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layouts/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('css'=>array('assets/global/plugins/jquery-nestable/jquery.nestable.css')), 0, false);
?>


<div class="portlet light mini">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject font-dark bold uppercase"><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</span>
        </div>
        <div class="actions">
            <?php if ($_smarty_tpl->tpl_vars['stg']->value->can_edit) {?>
                <span class="btn dark" id="load" style="display:none">
                            <i class="fa fa-spinner fa-pulse fa-1x fa-f"></i>
                        </span>
                <a class="btn btn-primary" onclick="MType.add();">
                    <i class="fa fa-plus"></i> Agregar
                </a>
            <?php }?>
        </div>
    </div>

    <div class="portlet-body">


        <?php if (empty($_smarty_tpl->tpl_vars['items']->value)) {?>
            <div class="alert alert-warning mrg-0">No hay datos disponibles para mostrar.</div>
        <?php } else { ?>
            <div class="dd" id="list">

                <ol class="dd-list">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'o', false, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['o']->value) {
?>
                        <li class="dd-item dd3-item" data-id="<?php echo $_smarty_tpl->tpl_vars['o']->value->id;?>
">
                            <?php if ($_smarty_tpl->tpl_vars['stg']->value->can_edit) {?>
                                <div class="dd-handle dd3-handle"></div>
                            <?php }?>
                            <div class="dd3-content">
                                <?php echo $_smarty_tpl->tpl_vars['o']->value->name;?>

                                <?php if ($_smarty_tpl->tpl_vars['stg']->value->can_edit) {?>
                                    <a class="btn dark btn-xs pull-right" onclick="MType.edit(items[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
]);">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                <?php }?>
                            </div>
                        </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                </ol>

            </div>
        <?php }?>

    </div>
</div>

<?php echo '<script'; ?>
>

    function $Ready() {

        MType.setup(<?php echo json_encode($_smarty_tpl->tpl_vars['opts']->value);?>
);

    }

<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender('file:layouts/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('js'=>array('assets/global/plugins/jquery-nestable/jquery.nestable.js','assets/js/m_type.js')), 0, false);
}
}
