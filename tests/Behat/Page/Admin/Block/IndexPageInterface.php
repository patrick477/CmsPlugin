<?php

/**
 * This file was created by the developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace Tests\BitBag\CmsPlugin\Behat\Page\Admin\Block;

use Sylius\Behat\Page\Admin\Crud\IndexPageInterface as BaseIndexPageInterface;

/**
 * @author Mikołaj Król <mikolaj.krol@bitbag.pl>
 */
interface IndexPageInterface extends BaseIndexPageInterface
{
    /**
     * @param string $type
     *
     * @return int
     */
    public function getBlocksWithTypeCount(string $type): int;

    /**
     * @param string $code
     */
    public function removeBlock(string $code): void;

    /**
     * @return array
     */
    public function getBlockTypes(): array;
}