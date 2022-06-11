<?php

declare(strict_types=1);

namespace CodeQuality\PHP_CodeSniffer\SymfonyStandard\Sniffs\Classes;

/**
 * This sniff signals the absence of an "Interface" suffix for interfaces.
 *
 * Compliance with Symfony standards. See documentation:
 * https://symfony.com/doc/current/contributing/code/standards.html
 */
final class RequiredSuffixInterfaceNamingSniff extends AbstractRequiredSuffixNamingSniff
{
    /**
     * {@inheritdoc}
     *
     * @return array<int, (int|string)>
     */
    public function register(): array
    {
        return [
            \T_INTERFACE,
        ];
    }

    public function getExpectedSuffix(): string
    {
        return 'Interface';
    }
}
