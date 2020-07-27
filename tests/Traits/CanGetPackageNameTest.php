<?php

namespace Aldrumo\Support\Tests\Traits;

use Aldrumo\Support\Traits\CanGetPackageName;
use PHPUnit\Framework\TestCase;

class CanGetPackageNameTest extends TestCase
{
    /**
     * @test
     */
    public function can_get_class_name_from_fqdn()
    {
        $class = new MyTestServiceProvider();

        $this->assertSame(
            'MyClass',
            $class->getName("\\This\\Is\\a\\Test\\Of\\MyClass")
        );
    }

    /**
     * @test
     */
    public function can_get_class_name_from_fqdn_and_trim()
    {
        $class = new MyTestServiceProvider();

        $this->assertSame(
            'MyClass',
            $class->getName("\\This\\Is\\a\\Test\\Of\\MyClassFooBar", 'FooBar')
        );
    }

    /**
     * @test
     */
    public function can_get_class_name_from_static_class_fqdn()
    {
        $class = new MyTestServiceProvider();

        $this->assertSame(
            'MyTestServiceProvider',
            $class->packageName()
        );
    }

    /**
     * @test
     */
    public function can_get_class_name_from_static_class_fqdn_and_trim()
    {
        $class = new MyTestServiceProvider();

        $this->assertSame(
            'MyTest',
            $class->packageName('ServiceProvider')
        );
    }
}

class MyTestServiceProvider
{
    use CanGetPackageName;
}
