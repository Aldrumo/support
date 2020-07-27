<?php

namespace Aldrumo\Support\Traits;

use Illuminate\Support\Str;

trait CanGetPackageName
{
    public function packageName($trim = null) : string
    {
        return $this->getName(static::class, $trim);
    }

    public function getName(string $fqdn, $trim = null): string
    {
        $name = Str::of(collect(explode('\\', $fqdn))->last());

        if ($trim !== null && $name->finish($trim)) {
            return $name->rtrim($trim);
        }

        return $name;
    }
}
