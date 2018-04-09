<?php

class Scrambler
{
    private $_FACES = array('U', 'D', 'L', 'R', 'F', 'B');
    private $length = null;

    function __construct()
    {
        $this->length = 25;
        $this->prime_chance = 25;
        $this->double_chance = 35;
    }

    /*
     * @return integer
     */
    public function getDoubleChance() {
        return $this->double_chance;
    }

    /*
     * @param integer $chance
     * @return $this
     */
    public function setDoubleChance($chance) {
        $this->double_chance = $chance;
        return $this;
    }

    /*
     *  @return integer
     */
    public function getPrimeChance() {
        return $this->prime_chance;
    }

    /*
     * @param integer $chance
     * @return $this
     */
    public function setPrimeChance($chance) {
        $this->prime_chance = $chance;
        return $this;
    }

    /*
     *  @return integer
     */
    public function getLength() {
        return $this->lenght;
    }

    /*
     * @param integer $length
     * @return $this
     */
    public function setLength($length) {
        $this->length = $length;
        return $this;
    }

     /*
      * @return string $scramble
      */
    public function generate() {
        $last_move = null;

        do {
            $current_move = $this->_FACES[array_rand($this->_FACES)];
            if ($current_move != $last_move) {
                $last_move = $current_move;
                $randomNum = mt_rand(0, 100);
                if ($randomNum <= $this->prime_chance) {
                    $current_move .= "'";
                } else if ($randomNum <= $this->prime_chance + $this->double_chance) {
                    $current_move .= "2";
                }
                $scramble[] = $current_move;
            }
        } while(count($scramble) < $this->length);

        return implode(' ', $scramble);
    }
}
