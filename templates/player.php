<?php
/*
 * Copyright (c) Piotr Bator <prbator@gmail.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

  $urlGenerator = $_['urlGenerator'];
  $version = \OCP\App::getAppVersion('guitartabplayer');
  $contentSecurityNonceManager = \OC::$server->getContentSecurityPolicyNonceManager();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

	<link rel="stylesheet" href="<?php p($urlGenerator->linkTo('apps/guitartabplayer', 'css/style.css')) ?>?v=<?php p($version) ?>"/>
    <link rel="stylesheet" href="<?php p($urlGenerator->linkTo('apps/guitartabplayer', 'css/webguide.css')) ?>?v=<?php p($version) ?>"/>

	<script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('core/vendor', 'jquery/dist/jquery.min.js')) ?>?v=<?php p($version) ?>"></script>
	<script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaTab/AlphaTab.min.js')) ?>?v=<?php p($version) ?>"></script>
    <script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaTab/jquery.alphaTab.js')) ?>?v=<?php p($version) ?>"></script>
    <script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaSynth/AlphaSynth.min.js')) ?>?v=<?php p($version) ?>"></script>
    <script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaTab/jquery.alphaTab.alphaSynth.js')) ?>?v=<?php p($version) ?>"></script>
	<script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/js', 'playerScript.js')) ?>?v=<?php p($version) ?>"></script>
  </head>
<?php
/*
 * Copyright (c) Piotr Bator <prbator@gmail.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

  $urlGenerator = $_['urlGenerator'];
  $version = \OCP\App::getAppVersion('guitartabplayer');
  $contentSecurityNonceManager = \OC::$server->getContentSecurityPolicyNonceManager();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

	<link rel="stylesheet" href="<?php p($urlGenerator->linkTo('apps/guitartabplayer', 'css/style.css')) ?>?v=<?php p($version) ?>"/>
    <link rel="stylesheet" href="<?php p($urlGenerator->linkTo('apps/guitartabplayer', 'css/webguide.css')) ?>?v=<?php p($version) ?>"/>

	<script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/js', 'player.js')) ?>?v=<?php p($version) ?>"></script>
  </head>
  <body>
    <div id="app"></div>
  </body>
</html>
</html>
