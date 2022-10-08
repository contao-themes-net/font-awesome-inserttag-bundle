<?php

declare(strict_types=1);

/*
 * Font Awesome Inserttag Bundle for Contao Open Source CMS
 *
 * Copyright (c) 2022 pdir / digital agentur // pdir GmbH
 *
 * @package    bootstrap-icons-inserttag
 * @link       https://github.com/contao-themes-net/bootstrap-icons-inserttag
 * @license    LGPL-3.0-or-later
 * @author     Mathias Arzberger <develop@pdir.de>
 * @author     Philipp Seibt <develop@pdir.de>
 * @author     Christian Mette <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\FontAwesomeInserttagBundle\Tests;

use ContaoThemesNet\FontAwesomeInserttagBundle\ContaoThemesNetFontAwesomeInserttagBundle;
use PHPUnit\Framework\TestCase;

class ContaoThemesNetBootstrapIconsInserttagTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new ContaoThemesNetFontAwesomeInserttagBundle();

        $this->assertInstanceOf('ContaoThemesNet\FontAwesomeInserttagBundle\ContaoThemesNetFontAwesomeInserttagBundle', $bundle);
    }
}
