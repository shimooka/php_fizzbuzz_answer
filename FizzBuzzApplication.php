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

require_once 'FizzBuzzPrintWriter.php';
require_once 'FizzBuzzSpecification.php';
require_once 'FizzBuzzVisitor.php';

/**
 * FizzBuzzApplication class
 *
 * The Main class of FizzBuzz application.
 */
class FizzBuzzApplication
{
    /**
     * A FizzBuzzVisitor object
     */
    private $visitor;

    /**
     * Constructor
     *
     * @param FizzBuzzVisitor   $visitor    FizzBuzzVisitor object. if not passed,
     *                                      generate new FizzBuzzVisitor object
     *                                      with FizzBuzzPrintWriter.
     */
    public function __construct(FizzBuzzVisitor $visitor = null)
    {
        if ($visitor === null) {
            $visitor = new FizzBuzzVisitor(new FizzBuzzPrintWriter());
        }
        $this->visitor = $visitor;
    }

    /**
     * Register specification and related message.
     *
     * @param FizzBuzzSpecification $spec       FizzBuzzSpecification object
     * @param string                $message    a message string related with
     *                                          FizzBuzzSpecification object
     */
    public function addSpecAndMessage(FizzBuzzSpecification $spec, $message)
    {
        $this->visitor->addSpecification($spec->setMessage($message));
    }

    /**
     * Execute this application
     *
     * @param array $data   an array data
     */
    public function run(array $data)
    {
        array_walk($data, [$this->visitor, 'visit']);
    }
}
