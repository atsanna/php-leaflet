<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2014 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\LeafletPHP\Definition\Vector;

use Netzmacht\LeafletPHP\Definition\Type\LatLng;

/**
 * Class Circle represents a circle object on the map.
 *
 * @package Netzmacht\LeafletPHP\Definition\Vector
 */
class Circle extends Path
{
    /**
     * {@inheritdoc}
     */
    public static function getType()
    {
        return 'Circle';
    }

    /**
     * The lat lng.
     *
     * @var LatLng
     */
    private $latLng = array();

    /**
     * The radius in meters.
     *
     * @var int
     */
    private $radius = 0;

    /**
     * Get the lat lang.
     *
     * @return LatLng|null
     */
    public function getLatLng()
    {
        return $this->latLng;
    }

    /**
     * Set the lat lang position.
     *
     * @param LatLng $latLng The coordinate.
     *
     * @return $this
     */
    public function setLatLng(LatLng $latLng)
    {
        $this->latLng = $latLng;

        return $this;
    }

    /**
     * Get the radius.
     *
     * @return int
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * Set the radius.
     *
     * @param int $radius The radius in meters.
     *
     * @return $this
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;

        return $this;
    }
}