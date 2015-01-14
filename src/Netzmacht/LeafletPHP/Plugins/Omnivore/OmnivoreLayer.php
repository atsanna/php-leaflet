<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2015 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\LeafletPHP\Plugins\Omnivore;

use Netzmacht\Javascript\Encoder;
use Netzmacht\Javascript\Type\ConvertsToJavascript;
use Netzmacht\LeafletPHP\Definition\EventsTrait;
use Netzmacht\LeafletPHP\Definition\HasEvents;
use Netzmacht\LeafletPHP\Definition\HasOptions;
use Netzmacht\LeafletPHP\Definition\LabelTrait;
use Netzmacht\LeafletPHP\Definition\Layer;
use Netzmacht\LeafletPHP\Definition\OptionsTrait;
use Netzmacht\LeafletPHP\Definition\Vector\AbstractLayer;

/**
 * Class OmnivoreLayer is the base omnivore layer providing support for a custom layer and options.
 *
 * @package Netzmacht\LeafletPHP\Plugins\Omnivore
 */
abstract class OmnivoreLayer extends AbstractLayer implements Layer, ConvertsToJavascript, HasEvents, HasOptions
{
    use OptionsTrait;
    use LabelTrait;
    use EventsTrait;

    /**
     * {@inheritdoc}
     */
    public static function getRequiredLibraries()
    {
        $libs   = parent::getRequiredLibraries();
        $libs[] = 'leaflet-omnivore';

        return $libs;
    }

    /**
     * The url being loaded.
     *
     * @var string
     */
    private $url;

    /**
     * Custom layer.
     *
     * @var Layer
     */
    private $customLayer;

    /**
     * Construct.
     *
     * @param string $identifier    The element id.
     * @param string $url           The url being loaded.
     * @param array  $parserOptions Parser options.
     * @param Layer  $customLayer   Optional custom layer.
     */
    public function __construct($identifier, $url, array $parserOptions = array(), Layer $customLayer = null)
    {
        parent::__construct($identifier);

        $this->customLayer = $customLayer;
        $this->url         = $url;

        $this->setOptions($parserOptions);
    }

    /**
     * Get the url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the url.
     *
     * @param string $url The url being loaded.
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the custom layer.
     *
     * @return Layer|null
     */
    public function getCustomLayer()
    {
        return $this->customLayer;
    }

    /**
     * Set the custom layer.
     *
     * @param Layer $customLayer The custom layer.
     *
     * @return $this
     */
    public function setCustomLayer(Layer $customLayer)
    {
        $this->customLayer = $customLayer;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function encode(Encoder $encoder, $finish = true)
    {
        $buffer = sprintf(
            '%s = %s(%s)%s',
            $encoder->encodeReference($this),
            strtolower(static::getType()),
            $encoder->encodeArguments(
                array(
                    $this->getUrl(),
                    $this->getOptions(),
                    $this->getCustomLayer()
                )
            )
        );

        foreach ($this->getMethodCalls() as $call) {
            $buffer .= "\n" . $call->encode($encoder, true);
        }

        return $buffer;
    }
}