<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<!-- Currency Selector Module -->
<div style="float:left;padding: 0 10px 0 0;margin: 2px 0;"><?php echo $text_before ?></div>
<form action="<?php echo JURI::getInstance()->toString(); ?>" method="post">
	<?php echo JHTML::_('select.genericlist', $currencies, 'virtuemart_currency_id', 'class="inputbox"', 'virtuemart_currency_id', 'currency_txt', $virtuemart_currency_id) ; ?>
	<input class="button bt_currency_button" type="submit" name="submit" value="<?php echo JText::_('MOD_VIRTUEMART_CURRENCIES_CHANGE_CURRENCIES') ?>" />
</form>
