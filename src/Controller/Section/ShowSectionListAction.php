<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace BitBag\SyliusCmsPlugin\Controller\Section;

use BitBag\SyliusCmsPlugin\ViewRepository\SectionListViewRepositoryInterface;
use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class ShowSectionListAction
{
    /**
     * @var ViewHandlerInterface
     */
    private $viewHandler;

    /**
     * @var SectionListViewRepositoryInterface
     */
    private $sectionListViewRepository;

    /**
     * @var string
     */
    private $fallbackLocale;

    /**
     * @param ViewHandlerInterface $viewHandler
     * @param SectionListViewRepositoryInterface $sectionListViewRepository
     * @param string $fallbackLocale
     */
    public function __construct(
        ViewHandlerInterface $viewHandler,
        SectionListViewRepositoryInterface $sectionListViewRepository,
        string $fallbackLocale
    ) {
        $this->viewHandler = $viewHandler;
        $this->sectionListViewRepository = $sectionListViewRepository;
        $this->fallbackLocale = $fallbackLocale;
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        try {
            return $this->viewHandler->handle(View::create($this->sectionListViewRepository->getListSections(
                $request->query->get('locale', $this->fallbackLocale)
            ), Response::HTTP_OK));
        } catch (\InvalidArgumentException $exception) {
            throw new NotFoundHttpException($exception->getMessage());
        }
    }
}