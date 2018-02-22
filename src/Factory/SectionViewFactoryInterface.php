<?php

namespace BitBag\SyliusCmsPlugin\Factory;

use BitBag\SyliusCmsPlugin\Entity\SectionInterface;
use BitBag\SyliusCmsPlugin\View\SectionView;

interface SectionViewFactoryInterface
{
    public function create(SectionInterface $section, string $locale): SectionView;
}