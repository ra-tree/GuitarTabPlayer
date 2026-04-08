<?php
namespace OCA\GuitarTabPlayer\Controller;

use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

class PageController extends Controller {
	private string $userId;

	/** @var IURLGenerator */
	private IURLGenerator $urlGenerator;

	public function __construct(string $AppName, IRequest $request, ?string $UserId, IURLGenerator $urlGenerator){
		parent::__construct($AppName, $request);
		$this->userId = $UserId ?? '';
		$this->urlGenerator = $urlGenerator;
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @return TemplateResponse
	 */
	 public function tabPlayer() {
		$params = [
			'urlGenerator' => $this->urlGenerator
		];
		return new TemplateResponse('guitartabplayer', 'player', $params, 'blank');  // templates/index.php

	}

}
