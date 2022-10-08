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
    private function replaceIconInsertTag(string $tag)
    {
        extract($this->fontAwesomeConfig);

        $parts = explode('::', $tag);

        @[$type, $name, $classes, $styles] = $parts;

        $classes = $classes ? " $classes" : '';
        $style = empty($styles) ? '' : " style='$styles'";

        // use icon font
        if(true === $use['icon_font'] || true === $use['svg'] && true === $use['js']) {
            return "<i class='$type fa-$name{$classes}'$style></i>";
        }

        // use svg image
        if(true === $use['svg']) {

            $typeFolder = 'regular';

            switch ($type) {
                case 'fa-brands':
                    $typeFolder = 'brands';
                    break;
                case 'fa-solid':
                    $typeFolder = 'solid';
                    break;
            }

            return "<img src='bundles/contaothemesnetfontawesomeinserttag/svgs/{$typeFolder}/{$name}.svg' class='fa-{$name}{$classes}'$style alt='$name'>";
        }

        return "<i>check your parameters.yml</i>";
    }
}
