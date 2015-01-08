<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2015 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\LeafletPHP\Definition\Vector;

use Netzmacht\LeafletPHP\Definition\GeoJson\ConvertsToGeoJson;
use Netzmacht\LeafletPHP\Definition\GeoJson\Feature;
use Netzmacht\LeafletPHP\Definition\GeoJson\FeatureTrait;
use Netzmacht\LeafletPHP\Definition\GeoJson\Geometry;
use Netzmacht\LeafletPHP\Definition\Group\FeatureGroup;
use Netzmacht\LeafletPHP\Definition\HasPopup;
use Netzmacht\LeafletPHP\Definition\OptionsTrait;
use Netzmacht\LeafletPHP\Definition\PopupTrait;
use Netzmacht\LeafletPHP\Definition\Type\LatLng;

/**
 * Class MultiPolygon is the definition for Leaflet multi polygon object.
 *
 * @package Netzmacht\LeafletPHP\Definition\Vector
 */
class MultiPolygon extends MultiPolyline
{
    /**
     * {@inheritdoc}
     */
    public static function getType()
    {
        return 'MultiPolygon';
    }

    /**
     * Name of the geo json representation.
     *
     * @var string
     */
    protected $geoJsonType = 'MultiPolygon';
}