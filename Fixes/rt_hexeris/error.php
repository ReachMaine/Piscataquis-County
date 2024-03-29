<?php
/**
* @version   $Id: error.php 9595 2013-04-23 16:30:12Z arifin $
* @author    RocketTheme http://www.rockettheme.com
* @copyright Copyright (C) 2007 - 2013 RocketTheme, LLC
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*
* Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
*
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
if (!isset($this->error)) {
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}

// load and inititialize gantry class
global $gantry;
require_once(dirname(__FILE__) . '/lib/gantry/gantry.php');
$gantry->init();

$doc = JFactory::getDocument();
$doc->setTitle($this->error->getCode() . ' - '.$this->title);

$gantry->addStyle('grid-responsive.css', 5);
$gantry->addLess('bootstrap.less', 'bootstrap.css', 6);

if ($gantry->browser->name == 'ie') {
        	if ($gantry->browser->shortversion == 9){
        		$gantry->addInlineScript("if (typeof RokMediaQueries !== 'undefined') window.addEvent('domready', function(){ RokMediaQueries._fireEvent(RokMediaQueries.getQuery()); });");
        	}
	if ($gantry->browser->shortversion == 8) {
		$gantry->addScript('html5shim.js');
	}
}
$gantry->addScript('rokmediaqueries.js');

ob_start();
?>
<body <?php echo $gantry->displayBodyTag(); ?>>
	<div class="rt-error">
	    <header id="rt-top-surround" class="<?php echo ($gantry->get('header-overlay') == 'light' ? 'rt-light' : 'rt-dark'); ?>">
	    	<div class="rt-topbar"></div>
			<?php /** Begin Header **/ if ($gantry->countModules('header')) : ?>
			<div id="rt-header">
				<div class="rt-container">
					<?php echo $gantry->displayModules('header','standard','standard'); ?>
					<div class="clear"></div>
				</div>
			</div>
			<?php /** End Header **/ endif; ?>
		</header>

		<div id="rt-transition"<?php if ($gantry->get('loadtransition')) echo $hidden; ?>>
			<div id="rt-mainbody-surround" class="<?php echo ($gantry->get('main-body-overlay') == 'light' ? 'rt-light' : 'rt-dark'); ?>">

				<?php /** Begin Main Body **/ ?>
				<div class="rt-container">
					<div class="rt-block">
						<div id="rt-mainbody">
							<div class="rt-error-desc">
								<div class="rt-error-img"></div>
								<div class="rt-error-content">
									<h1 class="error-title title">Error: <span><?php echo $this->error->getCode(); ?></span> - <?php echo $this->error->getMessage(); ?></h1>
									<div class="error-content">
										<p><strong>You may not be able to visit this page because of:</strong></p>
										<ol>
											<li>an out-of-date bookmark/favourite</li>
											<li>a search engine that has an out-of-date listing for this site</li>
											<li>a mistyped address</li>
											<li>you have no access to this page</li>
											<li>The requested resource was not found.</li>
											<li>An error has occurred while processing your request.</li>
										</ol>
										<p><a href="<?php echo $gantry->baseUrl; ?>" class="readon"><span>&larr; Home</span></a></p>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
			    </div>
				<?php /** End Main Body **/ ?>

			</div>
		</div>
		<footer id="rt-footer-surround" class="<?php echo ($gantry->get('footer-overlay') == 'light' ? 'rt-light' : 'rt-dark'); ?>">
			<div id="rt-bottom"></div>
			<?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
			<div id="rt-copyright">
				<div class="rt-container">
					<?php echo $gantry->displayModules('copyright','standard','standard'); ?>
					<div class="clear"></div>
				</div>
			</div>
			<?php /** End Copyright **/ endif; ?>
		</footer>
	</div>
</body>
</html>
<?php

$body = ob_get_clean();
$gantry->finalize();

/*  zig - replace with below require_once(JPATH_LIBRARIES.'/joomla/document/html/renderer/head.php'); */
if(!class_exists('JDocumentRendererHead')) {
  $head = JPATH_LIBRARIES . '/joomla/document/html/renderer/head.php';
  if(file_exists($head)) {
    require_once($head);
  }
}
$header_renderer = new JDocumentRendererHead($doc);
$header_contents = $header_renderer->render(null);


ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<?php echo $header_contents; ?>
	<?php if ($gantry->get('layout-mode') == '960fixed') : ?>
	<meta name="viewport" content="width=960px">
	<?php elseif ($gantry->get('layout-mode') == '1200fixed') : ?>
	<meta name="viewport" content="width=1200px">
	<?php else : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php endif; ?>
</head>
<?php
$header = ob_get_clean();
echo $header.$body;;
