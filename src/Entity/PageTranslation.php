<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace BitBag\SyliusCmsPlugin\Entity;

use Sylius\Component\Resource\Model\AbstractTranslation;

class PageTranslation extends AbstractTranslation implements PageTranslationInterface
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $slug;

    /** @var PageImageInterface */
    protected $image;

    /** @var string */
    protected $name;

    /** @var string */
    protected $content;

    /** @var string */
    protected $metaKeywords;

    /** @var string */
    protected $metaDescription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    public function getImage(): ?PageImageInterface
    {
        return $this->image;
    }

    public function setImage(?PageImageInterface $image): void
    {
        $image->setOwner($this);

        $this->image = $image;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getMetaKeywords(): ?string
    {
        return $this->metaKeywords;
    }

    public function setMetaKeywords(?string $metaKeywords): void
    {
        $this->metaKeywords = $metaKeywords;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): void
    {
        $this->metaDescription = $metaDescription;
    }
}
