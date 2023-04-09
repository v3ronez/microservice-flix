<?php

  namespace Tests\Unit;

  use Core\Domain\Entity\Category;
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

    public function test_desative()
    {
      $category = new Category(
        name: 'new Category',
        is_active: true
      );
      $category->desative();
      $this->assertFalse($category->is_active);

    }
  }