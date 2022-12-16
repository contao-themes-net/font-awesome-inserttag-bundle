# Font Awesome Inserttag Bundle

Dieses Bundle installiert einen InsertTag, mit dessen Hilfe Font Awesome Icons als Font oder via SVG in Contao genutzt werden können.

### About Font Awesome

The full suite of pictographic icons, examples, and documentation can be found at: https://fontawesome.com/

License

- The Font Awesome font is licensed under the SIL Open Font License - http://scripts.sil.org/OFL
- Font Awesome CSS, LESS, and SASS files are licensed under the MIT License - http://opensource.org/licenses/mit-license.html
- The Font Awesome pictograms are licensed under the CC BY 3.0 License - http://creativecommons.org/licenses/by/3.0/
- Attribution is no longer required in Font Awesome 3.0, but much appreciated: "Font Awesome by Dave Gandy - http://fortawesome.github.com/Font-Awesome"

### Allgemeine Form des Tags

Das Tag beginnt mit dem Prefix ```fa ``` und ihm folgen **drei weitere** Parameter. Parameter 1 und 2 sind
erforderlich, Parameter 3 und 4 sind optional und können auch weggelassen werden. Das Tag besteht also insgesamt aus
4 Parametern. Die allgemeine Form sieht so aus:

    {{fa::name::classes::styles}}
    {{fa-brands::name::classes::styles}}
    {{fa-regular::name::classes::styles}}
    {{fa-solid::name::classes::styles}}

### Der erste Parameter &raquo;fa&laquo;
...ist konstant und kennzeichnet das Tag.

### Der zweite Parameter &raquo;name&laquo;
...muss durch den Namen des Icons ersetzt werden. Dabei sollte der Name des Icons verwendet werden, wie er auf
der Seite **Font Awesome Icons** angegeben ist: https://fontawesome.com/search?m=free&o=r - also ohne Prefix ```fa-```!

**Beispiel:**

    {{fa-solid::check}}

### Der dritte Parameter &raquo;classes&laquo;
...**kann** (ist optional) eine oder mehrere CSS-Klassen-Namen enthalten. Für das Bereitstellen der Klasse müssen die Administratorinnen und
Administratoren selbst Sorge tragen. Mehrere Klassen-Namen können wie im class-Attribute eines HTML-Tags notiert werden - also auch durch
Leerzeichen getrennt.

**Beispiel:**

    {{fa-solid::check::class1 class2 class3}}

<div style="background:#FEB099;padding:4px;"><b>Achtung!</b>
Die Vordergrundfarbe (color) kann für ein SVG-Element als Bild nicht durch das style-Attribute gesetzt werden!
</div>

### Konfiguration

Das Font Awesome Inserttag Bundle kann mit der **parameters.yml** konfiguriert werden.
Diese wird wie folgt mitgeliefert:

```
parameters:
    font_awesome_config:
        local_source: ''
        use:
            icon_font: true
            svg: false
            svg_sprites: false
            js: false
```

Die Konfiguration befindet sich unterhalb des Schlüssels ``font_awesome_config``.

Zurzeit werden dort zwei Schlüssel ausgewertet. Der Schlüssel ``use`` und `local_source`.

### use
Mit dem Schlüssel ``use`` können die Darstellungsmethoden der Icons festgelegt werden.
Fallback ist ``icon_font: true``.
Soll statt der Icon-Font die Methode SVG als Bild zum Einsatz kommen, so muss ``icon_font: false`` und ``svg: true`` gesetzt sein.
Es werden nun img-Tags ausgegeben. Mittels `svg_sprites: true` und `svg: false` werden die Icons als [SVG-Sprites](https://fontawesome.com/docs/web/add-icons/svg-sprites) eingebunden. Soll die Generierung der SVG Tags per Javascript erfolgen, kannst du zu `svg: true` zusätzlich ``js: true`` nutzen.

Beispiele:

**Icon Font**
```
<i class="fa fa-check class1 class2 class3"></i>
```

**SVG als Bild**
```
<img src="bundles/contaothemesnetfontawesomeinserttag/svgs/regular/phone.svg" class="fa-check class1 class2 class3" alt="phone">
```

**SVG-Sprites**
```
<svg class="icon class1 class2 class3">
    <use xlink:href="bundles/contaothemesnetfontawesomeinserttag/sprites/solid.svg#phone"></use>
</svg>
```

**SVG + JavaScript**
```
<svg style="display: none;">
    <symbol data-fa-symbol="phone" class="svg-inline--fa fa-phone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" id="phone">
        <path fill="currentColor" ...></path>
    </symbol>
</svg>
<!-- <i data-fa-symbol="phone" class="fa-solid fa-phone"></i> Font Awesome fontawesome.com -->
<svg class="icon fa-2x"><use xlink:href="#phone"></use></svg>
```

### local_source

Über `local_source: 'files/dein-pfad-zum-fontawesome-ordner'` kannst du den Pfad zu Font Awesome anpassen, um zum 
Beispiel die Pro-Variante oder eine andere Font Awesome Version einzubinden. Gib dazu den kompletten Pfad ab files zum 
Font Awesome Ordner, wo die Ordner css, js, svgs usw. enthalten sind, an. 

------

# Font Awesome Inserttag

This bundle installs an InsertTag that allows Font Awesome icons to be used as a font or via SVG in Contao.

### General form of the tag

The tag starts with the prefix ``fa `` and it is followed by **three more** parameters. Parameters 1 and 2 are
required, parameters 3 and 4 are optional and can be omitted. So the tag consists of a total of
4 parameters. The general form looks like this:

    {{fa::name::classes::styles}}
    {{fa-brands::name::classes::styles}}
    {{fa-regular::name::classes::styles}}
    {{fa-solid::name::classes::styles}}

### The first parameter &raquo;fa&laquo;
...is constant and identifies the tag.

### The second parameter &raquo;name&laquo;
...must be replaced by the name of the icon. The name of the icon should be used as shown
on the **Bootstrap Icons** page: https://icons.getbootstrap.com - that is, without the ``fa-`` prefix!

**Example:**

    {{fa-solid::check}}

### The third parameter &raquo;classes&laquo;
...**may** (is optional) contain one or more CSS class names. The administrators must take care of providing the class themselves.
Multiple class names can be noted as in the class attribute of an HTML tag - i.e. also separated by
spaces.

**Example:**

    {{fa-solid::check::class1 class2 class3}}

### The fourth parameter &raquo;styles&laquo;
...**may** (is optional) contain one or more style statements.

**Beispiel:**

    // for svg (svg: true)
    {{fa-solid::check::fa-spin fa-3x fa-fw::width:50px;background-color:orangered;border-radius: 50px;}}

    // for icon font
    {{fa-solid::check::fa-spin fa-3x fa-fw::font-size:3em;background-color:orangered;border-radius: 50px;}}


### Configuration

The Font Awesome Inserttag Bundle can be configured using **parameters.yml**.
This is supplied as follows:
```
parameters:
    font_awesome_config:
        local_source: ''
        use:
            icon_font: true
            svg: false
            svg_sprites: false
            js: false
```
The configuration is located below the ``font_awesome_config`` key.

Currently, two other keys are evaluated there. The ``local_source`` key and the ``use`` key.

### use
The ``use`` key can be used to define the four display methods of the icons.
Fallback is ``icon_font: true``.
If the SVG as image method is to be used instead of the icon font, ``icon_font: false`` and ``svg: true`` must be set.
Now img tags will be output. Using `svg_sprites: true` and `svg: false` you can use icons included as 
[svg sprites](https://fontawesome.com/docs/web/add-icons/svg-sprites). 
If you want the SVG tags to be generated by Javascript, you can use ``svg: true`` and ``js: true``.
in addition.

Examples:

**Icon Font**
```
<i class="fa fa-check class1 class2 class3"></i>
```

**SVG as image**
```
<img src="bundles/contaothemesnetfontawesomeinserttag/svgs/regular/phone.svg" class="fa-check class1 class2 class3" alt="phone">
```

**SVG Sprites**
```
<svg class="icon class1 class2 class3">
    <use xlink:href="bundles/contaothemesnetfontawesomeinserttag/sprites/solid.svg#phone"></use>
</svg>
```

**SVG + JavaScript**
```
<svg style="display: none;">
    <symbol data-fa-symbol="phone" class="svg-inline--fa fa-phone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" id="phone">
        <path fill="currentColor" ...></path>
    </symbol>
</svg>
<!-- <i data-fa-symbol="phone" class="fa-solid fa-phone"></i> Font Awesome fontawesome.com -->
<svg class="icon fa-2x"><use xlink:href="#phone"></use></svg>
```
