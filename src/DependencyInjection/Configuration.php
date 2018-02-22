<?php


declare(strict_types=1);

namespace BitBag\SyliusCmsPlugin\DependencyInjection;

use BitBag\SyliusCmsPlugin\View;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bitbag_sylius_cms_plugin');

        $this->buildViewClassesNode($rootNode);

        return $treeBuilder;
    }

    private function buildViewClassesNode(ArrayNodeDefinition $rootNode): void
    {
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('view_classes')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('section')->defaultValue(View\SectionView::class)->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
