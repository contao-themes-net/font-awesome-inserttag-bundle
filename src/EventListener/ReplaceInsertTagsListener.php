<?php

declare(strict_types=1);

namespace ContaoThemesNet\FontAwesomeInserttagBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;

/**
 * @Hook("replaceInsertTags")
 */
class ReplaceInsertTagsListener
{
    /**
     * @var
     */
    private array $fontAwesomeConfig;

    /**
     * @param $fontAwesomeConfig
     */
    public function __construct($fontAwesomeConfig)
    {
        $this->fontAwesomeConfig = $fontAwesomeConfig;
    }

    /**
     * Replace the insert tag.
     *
     * @param string $tag the insert tag
     *
     * @return bool|string
     */
    public function __invoke(string $tag)
    {
        if (preg_match('/^fa([bsrl]?)::/', $tag)) {
            return $this->replaceIconInsertTag($tag);
        }

        if (preg_match('/^fa([bsrl]?)-brands::/', $tag)) {
            return $this->replaceIconInsertTag($tag);
        }

        if (preg_match('/^fa([bsrl]?)-regular::/', $tag)) {
            return $this->replaceIconInsertTag($tag);
        }

        if (preg_match('/^fa([bsrl]?)-solid::/', $tag)) {
            return $this->replaceIconInsertTag($tag);
        }

        return false;
    }

    /**
     * Replace the icon insert tag.
     *
     * @param string $tag the given tag
     *
     * @return string the html code
     */
    private function replaceIconInsertTag(string $tag): string
    {
        extract($this->fontAwesomeConfig);

        $parts = explode('::', $tag);

        @[$type, $name, $classes, $styles] = $parts;

        $classes = $classes ? " $classes" : '';
        $style = empty($styles) ? '' : " style='$styles'";

        // use icon font
        if($use['icon_font'] && false === $use['svg'] && false === $use['js']) {
            return "<i class='$type fa-$name{$classes}'$style></i>";
        }

        // use svg image
        if(false === $use['icon_font'] && ($use['svg'] || $use['svg_sprites']) && false === $use['js']) {

            $typeFolder = 'regular';
            $sourcePath = $local_source;

            switch ($type) {
                case 'fa-brands':
                    $typeFolder = 'brands';
                    break;
                case 'fa-solid':
                    $typeFolder = 'solid';
                    break;
            }

            if($use['svg_sprites']) {
                return "<svg class='icon{$classes}'><use xlink:href='{$sourcePath}/sprites/{$typeFolder}.svg#{$name}'></use></svg>";
            }

            return "<img src='{$sourcePath}/svgs/{$typeFolder}/{$name}.svg' class='icon-{$name}{$classes}'$style alt='$name'>";
        }

        // use svg + js
        if(false === $use['icon_font'] && $use['svg'] && $use['js']) {
            return "<i data-fa-symbol='{$name}' class='{$type} fa-{$name}'></i><svg class='icon{$classes}'><use xlink:href='#{$name}'></use></svg>";
        }

        return "<i>check your parameters.yml</i>";
    }
}
