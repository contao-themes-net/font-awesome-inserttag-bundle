# Font Awesome Inserttag Bundle

Dieses Bundle installiert ein InserTag, mit dessen Hilfe Font Awesome Icons als Font oder via SVG in Contao genutzt werden können.

### About Font Awesome

The full suite of pictographic icons, examples, and documentation can be found at: https://fontawesome.com/

License

- The Font Awesome font is licensed under the SIL Open Font License - http://scripts.sil.org/OFL
- Font Awesome CSS, LESS, and SASS files are licensed under the MIT License - http://opensource.org/licenses/mit-license.html
- The Font Awesome pictograms are licensed under the CC BY 3.0 License - http://creativecommons.org/licenses/by/3.0/
- Attribution is no longer required in Font Awesome 3.0, but much appreciated: "Font Awesome by Dave Gandy - http://fortawesome.github.com/Font-Awesome"

### Allgemeine Form des Tags

Das Tag beginnt mit dem Prefix ```&nbsp;fa ```&nbsp;und ihm folgen **drei weitere** Parameter. Parameter 1 und 2 sind
erforderlich, Parameter 3 und 4 sind optional und können auch weggelassen werden. Das Tag besteht also insgesamt aus
4 Parametern. Die allgemeine Form sieht so aus:

    {{fa::name::classes::styles}}
    {{fa-brand::name::classes::styles}}
    {{fa-regular::name::classes::styles}}
    {{fa-solid::name::classes::styles}}

### Der erste Parameter &raquo;fa&laquo;
...ist konstant und kennzeichnet das Tag.

### Der zweite Parameter &raquo;name&laquo;
...muss durch den Namen des Icons ersetzt werden. Dabei sollte der Name des Icons verwendet werden, wie er auf
der Seite **font Awesome Icons** angegeben ist:https://fontawesome.com/search?m=free&o=r - also ohne Prefix ```fa-```!

**Beispiel:**

    {{fa-solid::check}}

Als Ergebnis sollte dieses Zeichen zu sehen sein:
![check.svg](src/Resources/public/img/bootstrap/check.svg)

### Der dritte Parameter &raquo;classes&laquo;
...**kann** (ist optional) eine oder mehrere CSS-Klassen-Namen enthalten. Für das Bereitstellen der Klasse müssen die Administratorinnen und
Administratoren selbst Sorge tragen. Mehrere Klassen-Namen können wie im class-Attribute eines HTML-Tags notiert werden - also auch durch
Leerzeichen getrennt.

**Beispiel:**

    {{fa-solid::check::class1 class2 class3}}

####
<div style="background:#FEB099;padding:4px;"><b>Achtung!</b>
Die Vordergrundfarbe (color) kann für ein SVG-Element nicht durch das style-Attribute gesetzt werden!
</div>

### Konfiguration

Das Font Awesome Inserttag Bundle kann in geringem Umfang mit der **parameters.yml** konfiguriert werden.
Diese wird wie folgt mitgeliefert:
```
parameters:
    font_awesome_config:
        use:
            icon_font: false
            svg: true
            js: false
```
Die Konfiguration befindet sich unterhalb des Schlüssels ``font_awesome_config``.

Zurzeit wird dort ein Schlüssel ausgewertet. Der Schlüssel ``use``.

### use
Mit dem Schlüssel ``use`` können die Darstellungsmethoden der Icons festgelegt werden.
Fallback ist ``icon_font: true``.
**Es können aber (in der aktuellen Version) nicht beide Darstellungsmethoden zugleich verwendet werden!**
Soll statt der Icon-Font die Methode SVG zum Einsatz kommen, so muss ``icon_font: false`` und ``svg: true`` gesetzt sein.
Es werden nun img-Tags ausgegeben. Soll die Generierung der SVG Tags per Javascript erfolgen, kannst du zusätzlich ``js: true``
nutzen.

**Beispiel:**

    <i class="fa fa-check class1 class2 class3"></i>
    or
    <img src="bundles/contaothemesnetfontawesomeinserttag/svgs/regular/phone.svg" class="fa-check class1 class2 class3" alt="phone">
    or
    <svg class="svg-inline--fa fa-check class1 class2 class3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" ... ></path></svg>



# Font Awesome Inserttag

This bundle installs an InserTag that allows Font Awesome icons to be used as a font or via SVG in Contao.

### General form of the tag

The tag starts with the prefix ``&nbsp;fa ``&nbsp;and it is followed by **three more** parameters. Parameters 1 and 2 are
required, parameters 3 and 4 are optional and can be omitted. So the tag consists of a total of
4 parameters. The general form looks like this:

    {{fa::name::classes::styles}}
    {{fa-brand::name::classes::styles}}
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

The Font Awesome Inserttag Bundle can be configured to a small extent using **parameters.yml**.
This is supplied as follows:
```
parameters:
    font_awesome_config:
        use:
            icon_font: false
            svg: true
            js: true
```
The configuration is located below the ``font_awesome_config`` key.

Currently, two other keys are evaluated there. The ``source`` key and the ``use`` key.

### use
The ``use`` key can be used to define the two display methods of the icons.
Fallback is ``icon_font: true``.
**However (in the current version) both display methods cannot be used at the same time!
If the SVG method is to be used instead of the icon font, ``icon_font: false`` and ``svg: true`` must be set.
Now img tags will be output. If you want the SVG tags to be generated by Javascript, you can additionally use ``js: true``.
in addition.

**Example:**

    <i class="fa fa-check class1 class2 class3"></i>
    or
    <img src="bundles/contaothemesnetfontawesomeinserttag/svgs/regular/phone.svg" class="fa-check class1 class2 class3" alt="phone">
    or
    <svg class="svg-inline--fa fa-check class1 class2 class3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" ... ></path></svg>

