<?php

/**
 * ownCloud - Richdocuments App
 *
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 * @copyright 2018 Piotr Mrowczynski <piotr@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 */
namespace OCA\Richdocuments;

use OCP\Util;

/**
 * Class HookHandler
 *
 * handles hooks
 *
 * @package OCA\Richdocuments
 */
class HookHandler {
	public static function addViewerScripts() {
		Util::addScript('richdocuments', 'viewer/viewer');
		Util::addStyle('richdocuments', 'viewer/odfviewer');
	}

	public static function addConfigScripts($array) {
		$appConfig = new AppConfig(\OC::$server->getConfig());
		$array['array']['oc_appconfig']['richdocuments'] = [
			'defaultShareAttributes' => [
				'secureViewCanDownload' => $appConfig->getAppValue('secure_view_can_dowload_default'),
				'secureViewCanPrint' => $appConfig->getAppValue('secure_view_can_print_default'),
			],
		];
	}
}
