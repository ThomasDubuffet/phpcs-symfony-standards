<?php

declare(strict_types=1);

namespace TDubuffet\Sniffs\Classes;

/**
 * This sniff signals the absence of an "Abstract" prefix for abstract class.
 *
 * Compliance with Symfony standards. See documentation:
 * https://symfony.com/doc/current/contributing/code/standards.html
 */
final class RequiredPrefixAbstractNamingSniff extends AbstractRequiredPrefixNamingSniff
{
    /**
     * {@inheritdoc}
     *
     * @return array<int, (int|string)>
     */
    public function register(): array
    {
        return [
            \T_ABSTRACT,
        ];
    }

    public function getExpectedPrefix(): string
    {
        return 'Abstract';
    }
}
