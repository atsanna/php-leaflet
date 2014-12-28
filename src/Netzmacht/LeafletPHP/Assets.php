<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2014 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\LeafletPHP;

/**
 * Interface Assets describes the result of the leaflet building.
 *
 * @package Netzmacht\LeafletPHP
 */
interface Assets
{
    const TYPE_SOURCE = 'source';
    const TYPE_FILE   = 'file';
    const TYPE_URL    = 'url';

    /**
     * Add a javascript.
     *
     * @param string $script Javascript source.
     * @param string $type   The resource type.
     *
     * @return void
     */
    public function addJavascript($script, $type = self::TYPE_SOURCE);

    /**
     * Add a stylesheet.
     *
     * @param string $stylesheet The stylesheet.
     * @param string $type       The resource type.
     *
     * @return
     */
    public function addStylesheet($stylesheet, $type = self::TYPE_FILE);

    /**
     * Get scripts html.
     *
     * @return string
     */
    public function getScriptsHtml();

    /**
     * Get styles html.
     *
     * @return string
     */
    public function getStylesHtml();

    /**
     * Get html.
     *
     * @return string
     */
    public function getHtml();
}
