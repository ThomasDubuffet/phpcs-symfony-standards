<?php

declare(strict_types=1);

namespace CodeQuality\PHP_CodeSniffer\SymfonyStandard\Sniffs\Classes;

use PHP_CodeSniffer\Files\File;
use SlevomatCodingStandard\Helpers\ClassHelper;
use Throwable;

/**
 * This sniff signals the absence of an "Expection" suffix for exceptions/throws.
 *
 * Compliance with Symfony standards. See documentation:
 * https://symfony.com/doc/current/contributing/code/standards.html
 */
final class RequiredSuffixExceptionNamingSniff extends AbstractRequiredSuffixNamingSniff
{
    /**
     * {@inheritdoc}
     *
     * @return array<int, (int|string)>
     */
    public function register(): array
    {
        return [
            \T_CLASS,
        ];
    }

    public function getExpectedSuffix(): string
    {
        return 'Exception';
    }

    public function process(File $phpcsFile, $stackPtr): void
    {
        $className = ClassHelper::getFullyQualifiedName($phpcsFile, $stackPtr);
        if (!\in_array(Throwable::class, class_implements($className), true)) {
            return;
        }

        parent::process($phpcsFile, $stackPtr);
    }
}
