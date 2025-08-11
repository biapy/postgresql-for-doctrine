<?php

declare(strict_types=1);

namespace MartinGeorgiev\Doctrine\DBAL\Types\ValueObject;

use Symfony\Component\Serializer\Attribute\Ignore;

interface LtreeInterface extends \Stringable
{
    /**
     * @param list<non-empty-string> $branch
     *
     * @throws \InvalidArgumentException if the branch is empty
     */
    public function __construct(array $branch);

    /**
     * @throws \InvalidArgumentException if the ltree is empty
     */
    public static function fromString(string $ltree): static;

    /**
     * @param non-empty-string $leaf
     *
     * @throws \InvalidArgumentException if the leaf is empty or contains dot
     */
    #[Ignore]
    public function createLeaf(string $leaf): static;

    /**
     * @return list<non-empty-string>
     */
    public function getBranch(): array;

    #[Ignore]
    public function equals(LtreeInterface $ltree): bool;

    #[Ignore]
    public function isAncestorOf(LtreeInterface $ltree): bool;

    #[Ignore]
    public function isDescendantOf(LtreeInterface $ltree): bool;

    #[Ignore]
    public function isRoot(): bool;

    /**
     * @throws \LogicException if the ltree is root
     */
    #[Ignore]
    public function getParent(): static;
}
