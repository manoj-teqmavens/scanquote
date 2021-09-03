<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
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

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Scan</span>Quote</a>
        </div>
        <div class="top-nav-links">
        <?php if($this->Identity->get('username')){?>
        <?= $this->Html->link('Logout',['controller'=>'users','action' => 'logout'])?>
        <?php } ?>
            <a target="_blank" rel="noopener" href=""></a>
            <a target="_blank" rel="noopener" href=""></a>
        </div>
    </nav>
    <main class="main">
        <div class="container">
        <?php
        
        if($this->Identity->get('username')){
            ?> 
        <div class="row">
<aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Scan Quote') ?></h4>
            <?= $this->Html->link(__('Employee Management'), ['controller' => 'users','action' => 'index',1], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Company Management'), ['controller' => 'companies','action' => 'index',1], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Markup Management'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Item Management'), ['action' => ''], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
            
            <?= $this->Flash->render() ?>
            
            
            <?= $this->fetch('content') ?>
            </div>
            <?php }else{
                ?>
                <?= $this->Flash->render() ?>
            
            
            <?= $this->fetch('content') ?>
        <?php } ?>
        </div>
        
    </main>
    <footer>
    </footer>
</body>
</html>
