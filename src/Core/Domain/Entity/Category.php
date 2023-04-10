<?php

  namespace Core\Domain\Entity;

  use Core\Domain\Entity\Traits\MethodsMagicsTrait;
  use Core\Domain\Exception\EntityValidateException;

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
      $this->validate();
    }

    public function validate()
    {
      if (empty($this->name)) {
        throw new EntityValidateException('name can`t be empty');
      }

      if (strlen($this->name) > 255 || strlen($this->name) < 5) {
        throw new EntityValidateException('invalid value of name');
      }

      if ($this->description != '' && (strlen($this->description) > 255 || strlen($this->description) < 5)) {
        throw new EntityValidateException('invalid value of description');
      }
    }

    public function activate(): void
    {
      $this->is_active = true;
    }

    public function disable(): void
    {
      $this->is_active = false;
    }

    public function update(string $name, string $description = ''): void
    {

      $this->description = $description;
      $this->name = $name;

      $this->validate();
    }
  }