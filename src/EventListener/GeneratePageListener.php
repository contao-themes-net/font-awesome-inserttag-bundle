<?php

declare(strict_types=1);

namespace ContaoThemesNet\FontAwesomeInserttagBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\LayoutModel;
use Contao\PageModel;
use Contao\PageRegular;

/**
 * The generatePage hook is triggered before the main layout (fe_page) is compiled.
 * It passes the page object, the layout object and a self-reference as arguments
 * and does not expect a return value.
 *
 * @Hook("generatePage")
 */
class GeneratePageListener
{
    private array $fontAwesomeConfig;

    public function __construct($fontAwesomeConfig)
    {
        $this->fontAwesomeConfig = $fontAwesomeConfig;
    }

    /**
     * @param PageModel   $pageModel   the current page object
     * @param LayoutModel $layout      the active page layout applied for rendering the page
     * @param PageRegular $pageRegular the current page type object
     */
    public function __invoke(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular): void
    {
        extract($this->fontAwesomeConfig);

        if(true === $use['icon_font']) {
            // use webfonts
            $GLOBALS['TL_CSS'][] = 'bundles/contaothemesnetfontawesomeinserttag/css/all.min.css';
        }

        if(false === $use['icon_font'] && $use['svg'] && $use['js']) {
            // use svg + js
            $GLOBALS['TL_CSS'][] = 'bundles/contaothemesnetfontawesomeinserttag/css/svg-with-js.min.css';
            $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/contaothemesnetfontawesomeinserttag/js/all.min.js';
        }
    }
}
