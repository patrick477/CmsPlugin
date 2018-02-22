<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace BitBag\SyliusCmsPlugin\Factory;

use BitBag\SyliusCmsPlugin\Entity\SectionInterface;
use BitBag\SyliusCmsPlugin\Entity\SectionTranslationInterface;
use BitBag\SyliusCmsPlugin\View\SectionView;

final class SectionViewFactory implements SectionViewFactoryInterface
{
    /**
     * @var string
     */
    private $sectionViewClass;

    /**
     * @param string $sectionViewClass
     */
    public function __construct(string $sectionViewClass)
    {
        $this->sectionViewClass = $sectionViewClass;
    }

    /**
     * {@inheritdoc}
     */
    public function create(SectionInterface $section, string $locale): SectionView
    {
        /** @var SectionTranslationInterface $sectionTranslation */
        $sectionTranslation = $section->getTranslation($locale);

        /** @var SectionView $sectionView */
        $sectionView = new $this->sectionViewClass();

        $sectionView->code = $section->getCode();

        $sectionView->name = $sectionTranslation->getName();

        return $sectionView;
    }
}