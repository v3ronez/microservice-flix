<?php

  namespace Tests\Unit;

  use Core\Teste;
  use PHPUnit\Framework\TestCase;

  class TestUnitTest extends TestCase
  {
    public function test_call_method_foo()
    {
      $test = new Teste();
      $response = $test->Foo();

      $this->assertEquals('Funcionando', $response);
    }
  }