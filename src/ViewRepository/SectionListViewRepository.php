<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace BitBag\SyliusCmsPlugin\ViewRepository;

use BitBag\SyliusCmsPlugin\Factory\SectionViewFactoryInterface;
use BitBag\SyliusCmsPlugin\Repository\SectionRepositoryInterface;
use BitBag\SyliusCmsPlugin\View\SectionListView;
use Webmozart\Assert\Assert;

final class SectionListViewRepository implements SectionListViewRepositoryInterface
{
    /**
     * @var SectionRepositoryInterface
     */
    private $sectionRepository;

    /**
     * @var SectionViewFactoryInterface
     */
    private $sectionViewFactory;

    /**
     * @param SectionRepositoryInterface $sectionRepository
     * @param SectionViewFactoryInterface $sectionViewFactory
     */
    public function __construct(
        SectionRepositoryInterface $sectionRepository,
        SectionViewFactoryInterface $sectionViewFactory
    )
    {
        $this->sectionRepository = $sectionRepository;
        $this->sectionViewFactory = $sectionViewFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getListSections(?string $localeCode): SectionListView
    {
        $sections = $this->sectionRepository->findByLocale($localeCode);

        Assert::notNull($sections, sprintf('Sections not found in %s locale.', $localeCode));

        $sectionListView = new SectionListView();

        foreach ($sections as $section) {
            $sectionListView->items[] = $this->sectionViewFactory->create($section, $localeCode);
        }

        return $sectionListView;
    }
}