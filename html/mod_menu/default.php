<?php
/**
 * @version		$Id: default.php 18212 2010-07-22 06:02:54Z eddieajau $
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$max_depth = 1;
$depth = 1;
foreach($list as &$item)
{
  if( $item->deeper )
  {
    $depth += 1;
    $max_depth = max($depth, $max_depth);
  }
  elseif( $item->shallower )
  {
    $depth -= 1;
  }
}

$class = ' class="joomla-nav'.$params->get('class_sfx');
if( $max_depth > 1 )
  $class .= " nav-max-$max_depth";
$class .= '"';
$id    = $params->get('tag_id') ? ' id="'.$params->get('tag_id').'"' : '';

?><nav>
  <ul<?=$class?>>
<?php

foreach ($list as $i => &$item)
{
	$id = ($item->id == $active_id) ? ' id="current"' : '';
	$class = in_array($item->id, $path) ? 'selected' : '';

	if( $item->deeper )
	{
	  if( !empty($class) )
	    $class .= ' ';
		$class .= 'parent';
	}
	
	if( !empty($class) )
	  $class = " class=\"$class\"";

	echo '<li'.$id.$class.'>';
	
/*	$item->anchor_title
	$item->menu_image
*/
	switch ($item->type)
	{
		case 'separator':
		case 'url':
		case 'component':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	}

	// The next item is deeper.
	if( $item->deeper )
		echo '<ul>';
	// The next item is shallower.
	elseif( $item->shallower )
	{
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else
		echo '</li>';
}
?>  </ul>
</nav>
