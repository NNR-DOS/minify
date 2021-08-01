<?php


namespace App\Service;


class HashingService
{
    public function __construct(
        private RandomStringGenerator $stringGenerator,
        private ValidationService     $validator,
    ) {}

    /**
     * Creates unique hash.
     *
     * @param int $minHashLength
     * @return string
     */
    public function generate(int $minHashLength = 5): string
    {
        do {
            // creates another hash if the generated one is not available
            $hash = $this->stringGenerator->generate($minHashLength);
            ++$minHashLength;
        } while (!$this->validator->checkAvailability($hash));

        return $hash;
    }
}