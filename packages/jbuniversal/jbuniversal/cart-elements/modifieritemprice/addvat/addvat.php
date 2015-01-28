<?php
/**
 * JBZoo App is universal Joomla CCK, application for YooTheme Zoo component
 * @package     jbzoo
 * @version     2.x Pro
 * @author      JBZoo App http://jbzoo.com
 * @copyright   Copyright (C) JBZoo.com,  All rights reserved.
 * @license     http://jbzoo.com/license-pro.php JBZoo Licence
 * @coder       Denis Smetannikov <denis@jbzoo.com>
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Class JBCartElementModifierItemPriceAddVAT
 */
class JBCartElementModifierItemPriceAddVAT extends JBCartElementModifierItemPrice
{
    /**
     * @param \JBCartValue $value
     * @param array        $data
     * @return mixed
     */
    public function edit(JBCartValue &$value, $data = array())
    {
        if ($layout = $this->getLayout('edit.php')) {
            $rate = $this->_order->val($this->get('rate', 0));
            $value->add($rate);

            return self::renderLayout($layout, array(
                'rate'  => $rate,
                'value' => $value
            ));
        }

        return null;
    }

    /**
     * @param JBCartValue    $value
     * @param ElementJBPrice $jbPrice
     * @param array          $session_data
     * @return \JBCartValue
     */
    public function modify(JBCartValue $value, $jbPrice = null, $session_data = null)
    {
        $testVal = $value->getClone();
        $rate = $this->getRate($jbPrice, $session_data);
        $testVal->add($rate);

        if ($testVal->isPositive()) {
            $value->add($this->getRate());
        } else {
            $value->setEmpty();
        }

        return $value;
    }
}