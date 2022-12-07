<?php

/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */
declare (strict_types=1);
namespace Spatie\WordPressRay\Ramsey\Uuid\Guid;

use Spatie\WordPressRay\Ramsey\Uuid\Builder\UuidBuilderInterface;
use Spatie\WordPressRay\Ramsey\Uuid\Codec\CodecInterface;
use Spatie\WordPressRay\Ramsey\Uuid\Converter\NumberConverterInterface;
use Spatie\WordPressRay\Ramsey\Uuid\Converter\TimeConverterInterface;
use Spatie\WordPressRay\Ramsey\Uuid\Exception\UnableToBuildUuidException;
use Spatie\WordPressRay\Ramsey\Uuid\UuidInterface;
use Throwable;
/**
 * GuidBuilder builds instances of Guid
 *
 * @see Guid
 *
 * @psalm-immutable
 */
class GuidBuilder implements UuidBuilderInterface
{
    /**
     * @param NumberConverterInterface $numberConverter The number converter to
     *     use when constructing the Guid
     * @param TimeConverterInterface $timeConverter The time converter to use
     *     for converting timestamps extracted from a UUID to Unix timestamps
     */
    public function __construct(private NumberConverterInterface $numberConverter, private TimeConverterInterface $timeConverter)
    {
    }
    /**
     * Builds and returns a Guid
     *
     * @param CodecInterface $codec The codec to use for building this Guid instance
     * @param string $bytes The byte string from which to construct a UUID
     *
     * @return Guid The GuidBuilder returns an instance of Ramsey\Uuid\Guid\Guid
     *
     * @psalm-pure
     */
    public function build(CodecInterface $codec, string $bytes) : UuidInterface
    {
        try {
            return new Guid($this->buildFields($bytes), $this->numberConverter, $codec, $this->timeConverter);
        } catch (Throwable $e) {
            throw new UnableToBuildUuidException($e->getMessage(), (int) $e->getCode(), $e);
        }
    }
    /**
     * Proxy method to allow injecting a mock, for testing
     */
    protected function buildFields(string $bytes) : Fields
    {
        return new Fields($bytes);
    }
}