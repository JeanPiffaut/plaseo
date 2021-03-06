<?php

global $page, $CONFIG, $country, $lang, $LANG;

use LangLib\Lang;

$home = "";
$product = "";
$blog = "";
$contact = "";

if($page == "home") {

    $home = "active";
} elseif($page == "product") {

    $product = "active";
} elseif($page == "blog") {

    $blog = "active";
} elseif($page == "contact") {

    $contact = "active";
} else {

    $home = "active";
}

?>
<header id="header" class="navbar navbar-expand-md navbar-dark header-fixed">
    <div class="container-fluid">
        <a href="<?= $CONFIG['actual_url']; ?>/" class="logo navbar-brand p-0">Lorem<span>ipsum</span></a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= $home; ?>">
                    <a class="nav-link" href="<?= $CONFIG['actual_url']; ?>/">Corporis</a>
                </li>
                <li class="nav-item <?= $product; ?>">
                    <a class="nav-link " href="<?= $CONFIG['actual_url']; ?>/product">dolor</a>
                </li>
                <li class="nav-item <?= $blog; ?>">
                    <a class="nav-link" href="<?= $CONFIG['actual_url']; ?>/blog">sit amet</a>
                </li>
                <li class="nav-item <?= $contact; ?>">
                    <a class="nav-link" href="<?= $CONFIG['actual_url']; ?>/contact">consectetur</a>
                </li>
                <?php
                /**
                 * Validamos si el multidioma o el multipais esta activado
                 * En caso de que alguno de los 2 los este, se imprime el boton y el contenido variara segun cual de los 2
                 * estaba activo o si ambos lo estaban
                 */
                if($CONFIG['deployment']['multi_national'] === true || $country['multi_lang'] === true) {

                    print '
                    <li class="dropdown ml-md-3">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="country_button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                    if($CONFIG['deployment']['multi_national'] === true) {

                        print $country['name'];
                    }

                    if($CONFIG['deployment']['multi_national'] === true && $country['multi_lang'] === true) {

                        print " - ";
                    }

                    if($country['multi_lang'] === true) {

                        print strtoupper($lang);
                    }

                    print '
                            </button>
                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-md-right dropdown-collapse" aria-labelledby="country_button">';

                    if($CONFIG['deployment']['multi_national'] === true) {

                        print '
                            <h6 class="dropdown-header">Pais</h6>';
                        foreach ($CONFIG['deployment'] as $countr) {

                            if(isset($countr['active']) && $countr['active'] === true) {

                                print '<a class="dropdown-item" href="' . $CONFIG['base_url'] . '/' . $countr['code'] . '/">' . $countr['name'] . '</a>';
                            }
                        }
                    }

                    if($CONFIG['deployment']['multi_national'] === true && $country['multi_lang'] === true) {

                        print '<div class="dropdown-divider"></div>';
                    }

                    if($country['multi_lang'] === true) {

                        print '
                            <h6 class="dropdown-header">Idioma</h6>';

                        foreach ($country['lang'] as $lan => $val) {

                            if($val == true) {

                                print '<a class="dropdown-item" href="' . $CONFIG['country_url'] . '/' . $lan . '/">' . strtoupper($lan) . '</a>';
                            }
                        }
                    }


                    print '
                        </div>
                    </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</header>
