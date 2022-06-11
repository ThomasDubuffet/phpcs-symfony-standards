<?php

declare(strict_types=1);

namespace TDubuffet\Sniffs\Classes;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\ClassHelper;

abstract class AbstractRequiredSuffixNamingSniff implements Sniff
{
    public const CODE_REQUIRED_SUFFIX = 'RequiredSuffix';

    /**
     * Retrieves the suffix that is expected in the class name.
     */
    abstract public function getExpectedSuffix(): string;

    /**
     * {@inheritdoc}
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $className = ClassHelper::getName($phpcsFile, $stackPtr);

        $expectedSuffix = $this->getExpectedSuffix();
        $suffix = substr($className, -\strlen($expectedSuffix));

        if (strtolower($expectedSuffix) === strtolower($suffix)) {
            return;
        }

        $messageError = sprintf(
            '%s class name should always have the suffix "%s".',
            $expectedSuffix,
            $expectedSuffix
        );

        $phpcsFile->addError($messageError, $stackPtr, self::CODE_REQUIRED_SUFFIX);
    }
}
