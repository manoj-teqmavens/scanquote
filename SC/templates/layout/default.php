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

$cakeDescription = 'Scan Quote: Streanline Supply Chain System LLC';
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
    <?= $this->Html->meta('favicon','/img/favicon.png',['type' => 'icon']);?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
<!-- 'normalize.min', 'milligram.min', 'cake', -->
    <?= $this->Html->css(['feather','themify-icons','vendor.bundle.base','simple-line-icons','style']) ?>

    <?= $this->fetch('meta') ?>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
   
    <?= $this->Html->script('jquery.min') ?>
    <?= $this->Html->script('vendor.bundle.base') ?>
   

</head>
<body>
  
        <div class="container-scroller">
              <?= $this->element('sidebar/top-nav');?>
        <?php
        
        if($this->Identity->get('username')){
            ?> 
           <!--  <div class="container-fluid page-body-wrapper"> -->
        <!-- <div class="row">
<aside class="column">
        <div class="side-nav"> 
            <h4 class="heading"><?= __('Scan Quote') ?></h4>-->
            <?= $this->element('sidebar/left-nav');?>
        <!-- </div> -->
    <!-- </aside> -->
    <div class="main-panel">
        <div class="content-wrapper">
            
            <?= $this->Flash->render() ?>
            
            
            <?= $this->fetch('content') ?>
            
            <?php }else{
                ?>
                <?= $this->Flash->render() ?>
            
            
            <?= $this->fetch('content') ?>
        <?php } ?>
        </div>
          <footer class="footer">
           <?= $this->element('sidebar/bottom-nav');?>
        </footer>
        </div>
        </div>
        
    
    
</body>
</html>
