<?php

  namespace Core\Domain\Entity;

  use Core\Domain\Entity\Traits\MethodsMagicsTrait;

  class Category
  {
    use MethodsMagicsTrait;

    public function __construct(
      protected string $id = '',
      protected string $name = '',
      protected string $description = '',
      protected bool   $is_active = true
    )
    {
    }

    public function activate()
    {
      $this->is_active = true;
    }

    public function desative()
    {
      $this->is_active = false;
    }

  }