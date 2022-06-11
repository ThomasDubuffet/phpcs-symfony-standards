<?php

declare(strict_types=1);

namespace TDubuffet\Sniffs\Classes;

use PHP_CodeSniffer\Files\File;
use SlevomatCodingStandard\Helpers\ClassHelper;
use SlevomatCodingStandard\Helpers\TokenHelper;

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
            \T_CLASS,
        ];
    }

    public function getExpectedPrefix(): string
    {
        return 'Abstract';
    }

    public function process(File $phpcsFile, $stackPtr): void
    {
		$previousPointer = TokenHelper::findPreviousEffective($phpcsFile, $stackPtr - 1);
		if ($phpcsFile->getTokens()[$previousPointer]['code'] !== T_ABSTRACT) {
			return;
		}

        parent::process($phpcsFile, $stackPtr);
    }
}
