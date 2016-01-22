<?php

namespace Postcodelib;

/**
 * Class Postcode
 * @author Ross Riley <riley.ross@gmail.com>
 */
class Postcode
{

    protected $expression = "/^(GIR ?0AA|[A-PR-UWYZ]([0-9]{1,2}|([A-HK-Y][0-9]([0-9ABEHMNPRV-Y])?)|[0-9][A-HJKPS-UW]) ?[0-9][ABD-HJLNP-UW-Z]{2})$/i";
    protected $postcode;
    protected $valid = false;
    protected $prefix;
    protected $suffix;


    public function __construct($postcode)
    {
        $this->postcode = $postcode;
        $this->process();
    }

    public function process() {
        $postcode = str_replace(' ', '', $this->postcode); // remove any spaces;
        $postcode = strtoupper($postcode); // force to uppercase;


        if (preg_match($this->expression, $postcode)) {
            $this->valid = true;
        }

        $this->suffix = substr($postcode, -3);
        $this->prefix = str_replace($this->suffix, '', $postcode);
        $this->postcode = $this->prefix . " " . $this->suffix;
    }

    public function valid()
    {
        return $this->valid;
    }

    public function postcode()
    {
        return $this->postcode;
    }

    public function prefix()
    {
        return $this->prefix;
    }

    public function suffix()
    {
        return $this->suffix;
    }

    public function __toString()
    {
        return $this->postcode();
    }


}