<?php

declare(strict_types=1);

namespace TDubuffet\Sniffs\Classes;

/**
 * This sniff signals the absence of a "Trait" suffix for traits.
 *
 * Compliance with Symfony standards. See documentation:
 * https://symfony.com/doc/current/contributing/code/standards.html
 */
final class RequiredSuffixTraitNamingSniff extends AbstractRequiredSuffixNamingSniff
{
    /**
     * {@inheritdoc}
     *
     * @return array<int, (int|string)>
     */
    public function register(): array
    {
        return [
            \T_TRAIT,
        ];
    }

    public function getExpectedSuffix(): string
    {
        return 'Trait';
    }
}
