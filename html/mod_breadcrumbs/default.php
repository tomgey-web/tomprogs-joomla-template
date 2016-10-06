<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_breadcrumbs
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul class="breadcrumbs<?php echo $moduleclass_sfx; ?>">
<?php if ($params->get('showHere', 1)) : ?>
  <li class="showHere"><?=JText::_('MOD_BREADCRUMBS_HERE')?></li>
<?php endif;
for($i = 0; $i < $count; ++$i)
{
	// Workaround for duplicate Home when using multilanguage
	if($i == 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link == $list[$i - 1]->link)
		continue;

	// If not the last item in the breadcrumbs add the separator
	if($i < $count - 1)
	{
	  echo '<li>';
		if( !empty($list[$i]->link) )
			echo '<a href="'.$list[$i]->link.'" class="pathway">'.$list[$i]->name.'</a>';
		else
			echo $list[$i]->name;
	  echo '</li>';

		if($i < $count - 2 && !empty($separator))
			echo "<li class=\"divider\">$separator</li>";
	}
	elseif($params->get('showLast', 1)) // when $i == $count -1 and 'showLast' is true
	{
		if($i > 0 && !empty($separator))
			echo "<li class=\"divider\">$separator</li>";

		echo '<li>'.$list[$i]->name.'</li>';
	}
} ?>
</ul>
