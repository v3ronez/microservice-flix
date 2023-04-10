<?php

  namespace Tests\Unit;

  use Core\Domain\Entity\Category;
  use Core\Domain\Exception\EntityValidateException;
  use PHPUnit\Framework\TestCase;

  class CategoryUnitTest extends TestCase
  {
    public function test_attr_category()
    {
      $category = new Category(id: 'random_id', name: 'new Category', description: 'new desc', is_active: true);
      $this->assertEquals('new Category', $category->name);
      $this->assertEquals('new desc', $category->description);
      $this->assertTrue(condition: $category->is_active);
    }

    public function test_activate()
    {
      $category = new Category(
        name: 'new Category',
        is_active: false
      );
      $category->activate();
      $this->assertTrue($category->is_active);

    }

    public function test_disable()
    {
      $category = new Category(
        name: 'new Category',
        is_active: true
      );
      $category->disable();
      $this->assertFalse($category->is_active);

    }

    public function test_update_name_and_description()
    {
      $uuid = 'random_uuid';
      $category = new Category(
        id: $uuid,
        name: 'old category',
        description: 'description'
      );

      $category->update('category updated', 'desc updated');
      $this->assertEquals('category updated', $category->name);
      $this->assertEquals('desc updated', $category->description);


    }

    public function test_update_description()
    {
      $uuid = 'random_uuid';
      $category = new Category(
        id: $uuid,
        name: 'old category',
        description: 'description'
      );

      $category->update('category updated', 'desc updated');
      $this->assertEquals('category updated', $category->name);
      $this->assertEquals('desc updated', $category->description);


    }

    public function test_throw_exception_name()
    {
      try {
        $category = new Category(name: 'nw',);
        $this->assertTrue(false);
      } catch (\Throwable $th) {
        $this->assertInstanceOf(EntityValidateException::class, $th);
      }
    }
  }