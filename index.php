<?php
/**
 * @copyright  Copyright (C) 2012 Thomas Geymayer <tomgey@gmail.com>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/* The following line loads the MooTools JavaScript Library */
//JHTML::_('behavior.framework', true);

$app = JFactory::getApplication();

// append sitename to page title
$this->setTitle( $this->getTitle() . ' - ' . $app->getCfg('sitename') );
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <jdoc:include type="head" />

    <!--<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/screen.css" type="text/css" media="screen, projection" />-->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/print.css" type="text/css" media="print" />
    <!-- [if lt IE 8]>
    <link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection">
    <![endif]-->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/joomla-nav/screen.css" type="text/css" media="screen" />

    <!-- The following line loads the template CSS file located in the template folder. -->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
  
    <!-- Load the XMAP stylesheet - TODO let it only load on xmap page -->  
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/components/com_xmap/assets/css/xmap.css" type="text/css" />

    <!-- The following line loads the template JavaScript file located in the template folder. It's blank by default. -->
    <!-- <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script> -->
    
    <!-- HTML5 support for IE < 9 -->
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
<?php $offset = $this->countModules('top') ? 13.5 : 1.5; ?>
    <header style="padding-bottom:<?=$offset?>em;">
      <h1><?php echo $app->getCfg('sitename'); ?></h1>
      <jdoc:include type="modules" name="header" style="none" />
      <jdoc:include type="modules" name="top-nav" style="none" />
    </header>
    <div id="content-box">
    <section>
<?php if( $this->countModules('top') ): ?>
      <div id="module-top">
        <jdoc:include type="modules" name="top" style="none" />
      </div>
<?php endif; ?>
      <jdoc:include type="modules" name="breadcrumbs" style="none" />
      <jdoc:include type="message" />
      <jdoc:include type="component" />
    </section>
    <footer>
      <jdoc:include type="modules" name="footer" style="none" />
      <span id="copyright">&copy;<?php echo date('Y'); ?> <?=$this->params->get('copyrightHolder')?></span>
    </footer>
    </div>
    <!-- Piwik -->
    <script src="http://stats.tomprogs.at/piwik.js" type="text/javascript"></script>
    <script type="text/javascript">
    try
    {
      var piwikTracker = Piwik.getTracker("http://stats.tomprogs.at/piwik.php", 1);
      piwikTracker.trackPageView();
      piwikTracker.enableLinkTracking();
    }
    catch( err ) {}
    </script>
    <noscript><img src="http://stats.tomprogs.at/piwik.php?idsite=1" style="border:0" alt="" /></noscript>
    <!-- End Piwik Tracking Code -->
  </body>
</html>
