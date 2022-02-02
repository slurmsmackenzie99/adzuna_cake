<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'Adzuna Job Offers';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['homepage_styles.css', 'normalize.min', 'milligram.min', 'home']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav>
    <?= $this->Html->link("Zaloguj się", 'users/login', ['class' => 'button']) ?>
</nav>
<div class="wrapper">
    <header>
        <img src="img/london.jpg" class="background">
        <!--        <img src="img/workers.png" class="foreground">-->
        <h1 class="title">Oferty pracy Adzuna</h1>
        <div class="oferty-buttons">
            <a href="/postings/search" class="button1">Przeglądaj oferty</a>
            <a href="/postings/add" class="button1">Dodaj ofertę</a>
        </div>
    </header>
    <section>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tempus turpis, sed faucibus lorem.
        Pellentesque at libero egestas, semper augue ut, volutpat odio. Nullam lacus risus, accumsan sed vestibulum
        quis, eleifend non ex. Phasellus sodales lacus sed interdum viverra. Pellentesque vel lacinia nulla. Aenean
        elementum semper diam vitae dapibus. Proin dapibus quis lectus at pretium. Duis id volutpat diam. Integer vel
        neque eget mauris laoreet porttitor non et justo. In iaculis tincidunt sollicitudin. Suspendisse dictum tempor
        elit, sit amet malesuada orci aliquam eget. Phasellus dapibus purus non nisl malesuada efficitur. Proin eu
        ligula elementum, feugiat sapien vel, aliquam magna. Donec id interdum nisl, elementum dapibus massa.

        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras varius risus
        nulla, at mattis eros porttitor eu. Duis sodales volutpat est ac blandit. Suspendisse potenti. Etiam ullamcorper
        orci dolor, sed placerat sem gravida quis. Praesent vitae ante faucibus, facilisis dui vel, luctus arcu. Aliquam
        ut convallis tortor, ut ullamcorper tortor. Aliquam in nisi vitae ante hendrerit porttitor. Orci varius natoque
        penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean et eros ex. Class aptent taciti
        sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.

        Etiam turpis neque, blandit feugiat urna sit amet, egestas elementum ligula. Vestibulum egestas pretium cursus.
        Vestibulum venenatis tincidunt ex, nec iaculis lacus volutpat a. Nullam rutrum tellus cursus leo gravida mattis.
        Nullam libero turpis, lobortis vel ante quis, dignissim maximus justo. Ut sed ipsum pellentesque arcu dapibus
        congue a quis justo. Sed cursus libero vitae lorem vehicula laoreet. Fusce sed molestie ante. Donec ut
        scelerisque tortor. Ut et ornare odio. Nam viverra ullamcorper eros vitae dignissim. Vestibulum a gravida
        sapien, vitae aliquam tortor. Phasellus pretium, dolor ut sodales interdum, odio arcu sollicitudin sapien, in
        tempus tellus eros a odio. Nunc blandit quam in arcu cursus congue. Sed non condimentum lorem, ac ornare mi.

        Praesent vel consectetur purus. Nullam odio lorem, malesuada pulvinar molestie at, maximus sodales augue. Nullam
        lobortis id lectus vel dapibus. Nullam porta ligula enim, et venenatis est malesuada sed. Cras ex lacus, dictum
        nec augue iaculis, volutpat pretium tellus. Vivamus posuere ipsum ac tempus fringilla. Quisque dictum nisl id
        nisi volutpat bibendum. Nullam aliquam nibh a erat laoreet viverra.

        Phasellus scelerisque congue odio a venenatis. Class aptent taciti sociosqu ad litora torquent per conubia
        nostra, per inceptos himenaeos. Aenean blandit libero eros, id vulputate leo posuere at. Fusce et leo nibh.
        Phasellus eu augue sapien. In dignissim nunc at lorem porttitor, a efficitur elit sollicitudin. Orci varius
        natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla consequat ante vel nisl
        scelerisque pharetra.
    </section>
</div>
</body>
</html>
