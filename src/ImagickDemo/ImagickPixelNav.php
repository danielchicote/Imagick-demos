<?php


namespace ImagickDemo;


class ImagickPixelNav implements ActiveNav, DemoNav {


    private $currentExample;
    
    private $imagePixelExamples = array(
        '__construct',
            //'ImagickPixel.clear', 
        'getColor',// ([ bool $normalized = false ] )
        'getColorAsString',// ( void )
            //No idea    'ImagickPixel.getColorCount',// ( void )
        'getColorValue',// ( int $color )
        'getColorValueQuantum',// ( int $color )
        'getHSL',// ( void )
        'isSimilar',// ( ImagickPixel $color , float $fuzz )
        'setColor',// ( string $color )
        'setColorValue',// ( int $color , float $value )
        'setcolorValueQuantum',// ( int $color , float $value )
        'setHSL',// ( float $hue , float $saturation , float $luminosity )
    );


    function renderPreviousButton() {

    }

    function renderNextButton() {
    }

    function renderImage($example, \Auryn\Provider $provider) {
        $classname = '\ImagickDemo\ImagickPixel\\' . $example;
        $provider->execute([$classname, 'renderImageSafe']);
    }

    function display($example, \Auryn\Provider $provider) {
        $this->currentExample = $example;
        $classname = 'ImagickDemo\ImagickPixel\\' . $example;
        $provider->alias('ImagickDemo\Example', $classname);
        $provider->alias('ImagickDemo\ActiveNav', get_class($this));
        $provider->share($this);
    }

    function displayIndex(\Auryn\Provider $provider) {
        $provider->alias('ImagickDemo\ActiveNav', get_class($this));
        $provider->share($this);
    }

    function renderTitle() {
        if ($this->currentExample) {
            return $this->currentExample;
        }
        return 'ImagickPixel';
    }

    function renderNav() {
        echo "<ul class='nav nav-sidebar smallPadding'>";
        foreach($this->imagePixelExamples as $imagePixelExample) {
            echo "<li>";
            echo "<a href='/ImagickPixel/$imagePixelExample'>".$imagePixelExample."</a>";
            echo "</li>";
        }
        echo "</ul>";
    }



}

 