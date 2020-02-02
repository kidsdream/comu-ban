<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-02 01:05:52
  from 'C:\MAMP\htdocs\php-board\src\View\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e35a1e02b3689_35409837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '831db421bfe3c3574d42df411af923084a2f406c' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\php-board\\src\\View\\footer.tpl',
      1 => 1580555498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e35a1e02b3689_35409837 (Smarty_Internal_Template $_smarty_tpl) {
?>      <footer id="l-footer">
        <p>
          <small>&copy; 2019 - <span id="thisYear"></span>  DREAM</small>
          <?php echo '<script'; ?>
 type="text/javascript">
            date = new Date();
            thisYear = date.getFullYear();
            document.getElementById("thisYear").innerHTML = thisYear;
          <?php echo '</script'; ?>
>
        </p>
      </footer>

    </div>

  </body>
</html>
<?php }
}
