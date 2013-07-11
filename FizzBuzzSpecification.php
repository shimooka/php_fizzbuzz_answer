<?php
/**
 * PHP version 5
 *
 * All rights reserved.
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 * + Redistributions of source code must retain the above copyright notice,
 * this list of conditions and the following disclaimer.
 * + Redistributions in binary form must reproduce the above copyright notice,
 * this list of conditions and the following disclaimer in the documentation and/or
 * other materials provided with the distribution.
 * + Neither the name of the <ORGANIZATION> nor the names of its contributors
 * may be used to endorse or promote products derived
 * from this software without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @author    Hideyuki SHIMOOKA <shimooka@doyouphp.jp>
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 */

namespace CodeIQ;

/**
 * FizzBuzzSpecification class
 *
 * This class represents each rule of 'fizzbuzz'.
 */
class FizzBuzzSpecification
{
    /**
     * the division value
     */
    private $divided_by = 1;

    /**
     * the related message
     */
    private $message = null;

    /**
     * Constructor
     *
     * @param   string  $divided_by         division value
     * @throws  InvalidArgumentException    Throws if the argument is not positive
     *                                      integer and zero.
     */
    public function __construct($divided_by)
    {
        if (!preg_match('/^[1-9][0-9]*$/', $divided_by)) {
            throw new InvalidArgumentException('invalid argument : ' . $divided_by);
        }
        $this->divided_by = $divided_by;
    }

    /**
     * Return if the specification is satisfied by argument value.
     *
     * @param   integer $value  an integer value.
     * @return  boolean         if the specification is satisfied.
     */
    public function isSatisfiedBy($value)
    {
        return ($value % $this->getDividedBy() === 0);
    }

    /**
     * Return the division value
     *
     * @return integer the division value
     */
    public function getDividedBy()
    {
        return $this->divided_by;
    }

    /**
     * Set related message
     *
     * @param string    $message        message string
     * @return FizzBuzzSpecification    this object
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Return related message
     *
     * @return  string  related message
     */
    public function getMessage()
    {
        return $this->message;
    }
}
