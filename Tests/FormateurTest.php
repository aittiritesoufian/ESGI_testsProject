<?php
namespace Tests;

use App\Util\Formateur;
use Exception;
use PHPUnit\Framework\TestCase;

class FormateurTest extends TestCase
{
    /** @var $formateur Formateur **/
    private $formateur;

    protected function setUp(): void
    {
        $this->formateur = new Formateur('formateur@gmail.com', 'Toto', 'titi', []);
    }

    public function testNominal()
    {
        $this->assertTrue($this->formateur->isValid());
    }

    public function testWrongEmail()
    {
        $this->formateur->setEmail('abc.com');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Wrong email format');
        $this->formateur->isValid();
    }

    public function testEmptyFirstname()
    {
        $this->formateur->setFirstname(null);
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Please enter a firstname');
        $this->formateur->isValid();
    }

    public function testEmptyLastname()
    {
        $this->formateur->setLastname(null);
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Please enter a lastname');
        $this->formateur->isValid();
    }


}