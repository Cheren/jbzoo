<?php
/**
 * JBZoo Application
 *
 * This file is part of the JBZoo CCK package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package    Application
 * @license    GPL-2.0
 * @copyright  Copyright (C) JBZoo.com, All rights reserved.
 * @link       https://github.com/JBZoo/JBZoo
 * @author     Denis Smetannikov <denis@jbzoo.com>
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$attrs = array(
    'name' => $this->getControlName('value'),
    'id'   => $this->htmlId(true),
    'rows' => '5',
    'cols' => '100'
);
?>
<textarea <?php echo $this->app->jbhtml->buildAttrs($attrs); ?>><?php echo $this->get('value'); ?></textarea>