<?php

declare(strict_types=1);

/*
 * Font Awesome Inserttag Bundle for Contao Open Source CMS
 *
 * Copyright (c) 2022 pdir / digital agentur // pdir GmbH
 *
 * @package    font-awesome-inserttag-bundle
 * @link       https://github.com/contao-themes-net/bootstrap-icons-inserttag
 * @license    LGPL-3.0-or-later
 * @author     Mathias Arzberger <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\FontAwesomeInserttagBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ContaoThemesNetFontAwesomeInserttagBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
