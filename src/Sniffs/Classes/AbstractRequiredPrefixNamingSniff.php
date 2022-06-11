<?php

declare(strict_types=1);

namespace CodeQuality\PHP_CodeSniffer\SymfonyStandard\Sniffs\Classes;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\ClassHelper;

abstract class AbstractRequiredPrefixNamingSniff implements Sniff
{
    public const CODE_REQUIRED_PREFIX = 'RequiredPrefix';

    /**
     * Retrieves the prefix that is expected in the class name.
     */
    abstract public function getExpectedPrefix(): string;

    /**
     * {@inheritdoc}
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $className = ClassHelper::getName($phpcsFile, $stackPtr);

        $expectedPrefix = $this->getExpectedPrefix();
        $prefix = substr($className, 0, \strlen($expectedPrefix));

        if (strtolower($expectedPrefix) === strtolower($prefix)) {
            return;
        }

        $messageError = sprintf(
            '%s class name should always have the prefix "%s".',
            $expectedPrefix,
            $expectedPrefix
        );

        $phpcsFile->addError($messageError, $stackPtr, self::CODE_REQUIRED_PREFIX);
    }
}
