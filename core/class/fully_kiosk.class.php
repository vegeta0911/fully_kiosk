<?php

/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/
/*

/* * ***************************Includes********************************* */
require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';
require_once __DIR__ . '/../../vendor/autoload.php';

class fully_kiosk extends eqLogic {
	public static $_widgetPossibility = array('custom' => true);
	/*     * *************************Attributs****************************** */

	public static $_infosMap = array();
	public static $_actionMap = array();
	public static $_settings = array();
	/*     * ***********************Methode static*************************** */

	/*
	* Fonction exécutée automatiquement toutes les minutes par Jeedom
	public static function cron() {

}

*/

public static function initInfosMap(){

	self::$_actionMap = array(
		'screenOn' => array(
			'name' => __('Allumer écran',__FILE__),
			'cmd' => 'screenOn',
		),
		'screenOff' => array(
			'name' => __('Eteindre écran',__FILE__),
			'cmd' => 'screenOff',
		),
		'clearCache' => array(
			'name' => __('Vider cache',__FILE__),
			'cmd' => 'clearCache',
		),
		'clearCookies' => array(
			'name' => __('Supprimer cookies',__FILE__),
			'isvisible' => 0,
			'cmd' => 'clearCookies',
		),
		'forceSleep' => array(
			'name' => 'forceSleep',
			'cmd' => 'forceSleep',
		),
		'startScreensaver' => array(
			'name' => __('Ecran de veille',__FILE__),
			'cmd' => 'startScreensaver',
		),
		'stopScreensaver' => array(
			'name' => __('Arrêter écran veille',__FILE__),
			'cmd' => 'stopScreensaver',
		),
		'startDaydream' => array(
			'name' => 'startDaydream',
			'isvisible' => 0,
			'cmd' => 'startDaydream',
		),
		'stopDaydream' => array(
			'name' => 'stopDaydream',
			'isvisible' => 0,
			'cmd' => 'stopDaydream',
		),

		'enableLockedMode' => array(
			'name' => __('Activer mode maintenance',__FILE__),
			'isvisible' => 0,
			'cmd' => 'enableLockedMode',
		),

		'disableLockedMode' => array(
			'name' => __('Désactiver mode maintenance',__FILE__),
			'isvisible' => 0,
			'cmd' => 'disableLockedMode',
		),

		'popFragment' => array(
			'name' => __('Retourner vue web',__FILE__),
			'isvisible' => 0,
			'cmd' => 'popFragment',
		),

		'loadStartURL' => array(
			'name' => __('Lancer URL de démarrage',__FILE__),
			'cmd' => 'loadStartURL',
		),
		'restartApp' => array(
			'name' => __('Redémarrer application',__FILE__),
			'cmd' => 'restartApp',
		),
		'exitApp' => array(
			'name' => __('Quitter application',__FILE__),
			'cmd' => 'exitApp',
		),

		'triggerMotion' => array(
			'name' => __('Simuler mouvement',__FILE__),
			'isvisible' => 0,
			'cmd' => 'triggerMotion',
		),
		'toForeground' => array(
			'name' => __("Basculer vers fully",__FILE__),
			'isvisible' => 0,
			'cmd' => 'toForeground',
		),
		'JavascriptOn' => array(
			'name' => __("Activer Javascript",__FILE__),
			'isvisible' => 0,
			'cmd' =>  "setBooleanSetting&key=websiteIntegration&value=true",
		),
		'JavascriptOff' => array(
			'name' => __("Désactiver Javascript",__FILE__),
			'isvisible' => 0,
			'cmd' =>  "setBooleanSetting&key=websiteIntegration&value=false",
		),
		'loadURL' => array(
			'name' => __('Charger URL',__FILE__),
			'cmd' => 'loadURL&url=#title#',
			'subtype' => 'message',
			'message_disable' => true,
			'forceReturnLineBefore' => true,

		),
		'javascript' => array(
			'name' => __('Commande javascript',__FILE__),
			'cmd' => 'loadURL&url=javascript:#title#',
			'message_placeholder' => "exemple: fully.setStartUrl('url')",
			'subtype' => 'message',
			'title_possibility_list' => array(
				'fully.turnScreenOn()',
				'fully.turnScreenOff() ',
				'fully.turnScreenOff(boolean keepAlive) ',
				'fully.forceSleep()',
				'fully.showToast(String text) ',
				'fully.setScreenBrightness(float level)',
				'fully.enableWifi()',
				'fully.disableWifi()',
				'fully.showKeyboard()',
				'fully.hideKeyboard()',
				'fully.openWifiSettings()',
				'fully.openBluetoothSettings()',
				'fully.vibrate()',
				'fully.textToSpeech(String text)',
				'fully.textToSpeech(String text, String locale)',
				'fully.playVideo(String url, boolean loop, boolean showControls, boolean exitOnTouch, boolean exitOnCompletion)',
				'fully.setAudioVolume(int level, int streamType)',
				'fully.playSound(String url, boolean loop)',
				'fully.stopSound()',
				'fully.showPdf(String url) ',
				'fully.loadStartUrl()',
				'fully.setActionBarTitle(String text)',
				'fully.startScreensaver()',
				'fully.stopScreensaver()',
				'fully.startDaydream()',
				'fully.stopDaydream()',
				'fully.addToHomeScreen()',
				'fully.print()',
				'fully.exit()',
				'fully.restartApp()',
				'fully.clearCache()',
				'fully.clearFormData()',
				'fully.clearHistory()',
				'fully.clearCookies()',
				'fully.clearWebstorage()',
				'fully.focusNextTab()  ',
				'fully.focusPrevTab()',
				'fully.focusTabByIndex(int index)',
				'fully.startApplication(String packageName)',
				'fully.startApplication(String packageName, String action, String url)',
				'fully.startIntent(String url)',
				'fully.bringToForeground()',
				'fully.bringToForeground(long millis)',
				'fully.setStartUrl(String url)',
				'fully.getAudioVolume(int streamType)',
				'fully.shareUrl()',
				'fully.getWifiSignalLevel()',
				'fully.emptyFolder(String path)',
				'fully.getFileList(String folder)',
				'fully.bringToBackground()',
				'fully.broadcastIntent(String url)',
				'fully.scanQrCode(String prompt, String resultUrl)',
				'fully.scanQrCode(String prompt, String resultUrl, int cameraId, int timeout, boolean beepEnabled, boolean showCancelButton)',
				'fully.btOpenByMac(String mac)',
				'fully.btOpenByUuid(String uuid)',
				'fully.btOpenByName(String name)',
				'fully.btIsConnected()',
				'fully.btGetDeviceInfoJson()',
				'fully.btClose()',
				'fully.btSendStringData(String stringData)',
				'fully.btSendHexData(String hexData)',
				'fully.btSendByteData(byte[] data)',
				'fully.closeTabByIndex(int index)',
				'fully.closeThisTab()',
				'fully.getTabList()', // returns a JSON array
				'fully.loadUrlInTabByIndex(int index, String url)',
				'fully.loadUrlInNewTab(String url, boolean focus)',
				'fully.getThisTabIndex()',
				'fully.focusThisTab()',
				'fully.showNotification(String title, String text, String url, boolean highPriority)',
				'fully.textToSpeech(String text, String locale, String engine, boolean queue)',
				'fully.stopTextToSpeech()',

			),

			'title_disable' => false,
			'message_disable' => true,
		),
		'startApplication' => array(
			'name' => __('Démarrer application',__FILE__),
			'cmd' => 'startApplication&package=#title#',
			'subtype' => 'message',
			'message_disable' => true,

		),
		'getCamshot' => array(
			'name' => __('Enregister image cam',__FILE__),
			'cmd' => 'getCamshot',
			'subtype' => 'message',
			'message_placeholder' => __('camshot.jpg par défaut',__FILE__),
			'title_placeholder' => __('/var/www/html/plugins/fully_kiosk/resources/ par défaut',__FILE__),

		),

		'loadTab' => array(
			'name' => __('Charger onglet N°',__FILE__),
			'cmd' => "focusTabByIndex&index=#title#",
			'title_placeholder' => '0 = premier onglet',
			'subtype' => 'message',
			'message_disable' => true,

		),
		'setOverlayMessage' => array(
			'name' => __('setOverlayMessage',__FILE__),
			'cmd' => "setOverlayMessage&text=#title#",
			'title_placeholder' => 'Envoyer message',
			'subtype' => 'message',
			'message_disable' => true,

		),
		// /?cmd=playSound&url=[url]&loop=[true|false]&password=[pass]
		'playSound' => array(
			'name' => __('Jouer musique/son',__FILE__),
			'cmd' => "playSound&url=#title#",
			'subtype' => 'message',
			'title_placeholder' => __('URL musique/son',__FILE__),
			'message_disable' => true,
		),

		'stopSound' => array(
			'name' => __('Arrêter musique',__FILE__),
			'cmd' => "stopSound",
		),

		'textToSpeech' => array(
			'name' => __('Envoyer TTS',__FILE__),
			'cmd' => "textToSpeech&text='#title#'",
			'subtype' => 'message',
			'title_placeholder' => __('Message à envoyer',__FILE__),
			'message_disable' => true ,
		),
		'textToSpeech2' => array(
			'name' => __('Envoyer TTS +',__FILE__),
			'cmd' => "textToSpeech&text='#message#'&#title#",
			'subtype' => 'message',
			'title_placeholder' => __('locale=fr_FR&engine=engine_name&queue=1',__FILE__),
			'message_placeholder' => __('Message à envoyer',__FILE__),
			'message_disable' => false ,
		),
		'stopTextToSpeech' => array(
			'name' => __('Arrêter TTS',__FILE__),
			'cmd' => "stopTextToSpeech",
		),
		'TTS_javascript' => array(
			'name' => __('TTS javascript',__FILE__),
			'cmd' => 'loadURL&url=javascript:fully.textToSpeech("#message#","#title#")',
			'message_placeholder' => "Message à envoyer",
			'title_placeholder' => "fr_FR pour le français",
			'subtype' => 'message',
			'title_possibility_list' => array(
				'fr_FR',
				'en_EN',
				'es_ES',
				'de_DE',)

				//'title_disable' => true,
			),
			'setAudioVolume' => array(
				'name' => __('Changer volume tablette',__FILE__),
				'cmd' => "setAudioVolume&level=#message#&stream=#title#",
				'subtype' => 'message',
				'message_placeholder' => __('Volume 0-100',__FILE__),
				'title_placeholder' => __('stream 0-10',__FILE__),
				'title_possibility_list' => array(
					'0 Volume voix appel',
					'1 Système',
					'2 Sonnerie',
					'3 Média',
					'4 Alarme',
					'5 Notification',
					'8 DMTF',
					'10 Accessibilité',

				),
				/*

				STREAM_ACCESSIBILITY
				added in API level 26
				public static final int STREAM_ACCESSIBILITY
				Used to identify the volume of audio streams for accessibility prompts

				Constant Value: 10 (0x0000000a)

				STREAM_ALARM
				added in API level 1
				public static final int STREAM_ALARM
				Used to identify the volume of audio streams for alarms

				Constant Value: 4 (0x00000004)

				STREAM_DTMF
				added in API level 5
				public static final int STREAM_DTMF
				Used to identify the volume of audio streams for DTMF Tones

				Constant Value: 8 (0x00000008)

				STREAM_MUSIC
				added in API level 1
				public static final int STREAM_MUSIC
				Used to identify the volume of audio streams for music playback

				Constant Value: 3 (0x00000003)

				STREAM_NOTIFICATION
				added in API level 3
				public static final int STREAM_NOTIFICATION
				Used to identify the volume of audio streams for notifications

				Constant Value: 5 (0x00000005)

				STREAM_RING
				added in API level 1
				public static final int STREAM_RING
				Used to identify the volume of audio streams for the phone ring

				Constant Value: 2 (0x00000002)

				STREAM_SYSTEM
				added in API level 1
				public static final int STREAM_SYSTEM
				Used to identify the volume of audio streams for system sounds

				Constant Value: 1 (0x00000001)

				STREAM_VOICE_CALL
				added in API level 1
				public static final int STREAM_VOICE_CALL
				Used to identify the volume of audio streams for phone calls

				Constant Value: 0 (0x00000000)

				*/
				'title_disable' => false,

			),

			'setBooleanSetting' => array(
				'name' => __('Paramètre true/false',__FILE__),
				'title_placeholder' => __('Choisir paramètre',__FILE__),
				'message_placeholder' => __('true ou false',__FILE__),
				'cmd' => "setBooleanSetting&key=#title#&value=#message#",
				'title_possibility_list' => array(
					'setRemoveSystemUI',
					'showMenuHint',
					'screenOffInDarkness',
					'useWideViewport',
					'geoLocationAccess',
					'launchOnBoot',
					'showBackButton',
					'enablePullToRefresh',
					'ignoreMotionWhenMoving',
					'kioskHomeStartURL',
					'disableCamera',
					'keepSleepingIfUnplugged',
					'microphoneAccess',
					'actionBarInSettings',
					'remoteAdminLan',
					'desktopMode',
					'thirdPartyCookies',
					'knoxDisableStatusBar',
					'disablePowerButton',
					'reloadOnInternet',
					'screensaverFullscreen',
					'pageTransitions',
					'playAlarmSoundUntilPin',
					'showAppLauncherOnStart',
					'usageStatistics',
					'movementDetection',
					'restartOnCrash',
					'sleepOnPowerConnect',
					'readNfcTag',
					'swipeNavigation',
					'screenOnOnMovement',
					'acra.legacyAlreadyConvertedToJson',
					'sleepOnPowerDisconnect',
					'knoxDisableUsbHostStorage',
					'deleteHistoryOnReload',
					'autoplayVideos',
					'loadOverview',
					'enableZoom',
					'reloadOnWifiOn',
					'advancedkioskProtection',
					'motionDetectionAcoustic',
					'reloadOnScreenOn',
					'enableBackButton',
					'mdmDisableUsbStorage',
					'setWifiWakelock',
					'lockSafeMode',
					'deleteWebstorageOnReload',
					'knoxDisableMtp',
					'audioRecordUploads',
					'showHomeButton',
					'autoplayAudio',
					'showPrintButton',
					'knoxDisableScreenCapture',
					'enableVersionInfo',
					'forceScreenUnlock',
					'waitInternetOnReload',
					'disableVolumeButtons',
					'showStatusBar',
					'disableStatusBar',
					'detectIBeacons',
					'screensaverDaydream',
					'videoCaptureUploads',
					'stopScreensaverOnMovement',
					'webcamAccess',
					'knoxDisableSafeMode',
					'disableOtherApps',
					'playAlarmSoundOnMovement',
					'forceImmersive',
					'enableTapSound',
					'showActionBar',
					'ignoreJustOnceLauncher',
					'remoteAdmin',
					'keepScreenOn',
					'cameraCaptureUploads',
					'showCamPreview',
					'pauseMotionInBackground',
					'setCpuWakelock',
					'softKeyboard',
					'enablePopups',
					'mdmDisableStatusBar',
					'textSelection',
					'fileUploads',
					'jsAlerts',
					'disableHomeButton',
					'webviewDebugging',
					'showNavigationBar',
					'showAddressBar',
					'mdmDisableScreenCapture',
					'autoImportSettings',
					'motionDetection',
					'kioskMode',
					'singleAppMode',
					'enableUrlOtherApps',
					'cloudService',
					'isRunning',
					'websiteIntegration',
					'reloadOnScreensaverStop',
					'deleteCookiesOnReload',
					'knoxDisableCamera',
					'knoxEnabled',
					'showProgressBar',
					'formAutoComplete',
					'playMedia',
					'showRefreshButton',
					'stopScreensaverOnMotion',
					'redirectBlocked',
					'showForwardButton',
					'mdmDisableADB',
					'restartAfterUpdate',
					'enableFullscreenVideos',
					'clearCacheEach',
					'confirmExit',
					'ignoreSSLerrors',
					'runInForeground',
					'deleteCacheOnReload',
					'screenOnOnMotion') ,
					'subtype' => 'message',

				),

				'setStringSetting' => array(
					'name' => __('Paramètre valeur',__FILE__),
					'title_placeholder' => __('Choisir paramètre',__FILE__),
					'message_placeholder' => __('valeur',__FILE__),
					'cmd' => "setStringSetting&key=#title#&value=#message#",
					'subtype' => 'message',
					'title_possibility_list' => array(
						'wifiKey',
						'movementBeaconList',
						'authUsername',
						'motionSensitivity',
						'remoteAdminPassword',
						'graphicsAccelerationMode',
						'authPassword',
						'addressBarBgColor',
						'motionSensitivityAcoustic',
						'kioskWifiPin',
						'wifiSSID',
						'darknessLevel',
						'cacheMode',
						'movementBeaconDistance',
						'screensaverBrightness',
						'alarmSoundFileUrl',
						'actionBarTitle',
						'urlBlacklist',
						'appLauncherScaling',
						'timeToScreensaverV2',
						'remotePdfFileMode',
						'mdmApkToInstall',
						'startURL',
						'actionBarBgColor',
						'compassSensitivity',
						'searchProviderUrl',
						'defaultWebviewBackgroundColor',
						'reloadPageFailure',
						'actionBarIconUrl',
						'initialScale',
						'actionBarBgUrl',
						'acra.lastVersionNr',
						'actionBarFgColor',
						'fadeInOutDuration',
						'reloadEachSeconds',
						'accelerometerSensitivity',
						'kioskExitGesture',
						'kioskAppWhitelist',
						'screensaverWallpaperURL',
						'forceScreenOrientation',
						'kioskPin',
						'appLauncherBackgroundColor',
						'motionCameraId',
						'urlWhitelist',
						'volumeLicenseKey',
						'launcherInjectCode',
						'sleepSchedule',
						'timeToScreenOffV2',
						'statusBarColor',
						'lastVersionInfo',
						'screensaverPlaylist',
						'launcherApps',
						'batteryWarning',
						'localPdfFileMode',
						'navigationBarColor',
						'motionFps',
						'errorURL',
						'screenBrightness',
						'remoteFileMode',
						'fontSize',
						'singleAppIntent',
						'userAgent')


					),

					'Refresh' => array(
						'name' => 'Refresh',
						'cmd' => 'deviceInfo&type=json&password=#password#',

					),

					'shutdownDevice' => array(
						'name' => __('Arrêter équipement (root)',__FILE__),
						'cmd' => 'shutdownDevice',
						'isvisible' => 0,
					),
					'rebootDevice' => array(
						'name' => __('Redémarrer équipement (root)',__FILE__),
						'cmd' => 'rebootDevice',
						'isvisible' => 0,
					),
				);

				self::$_settings = array(
					'mqttEnabled' => array(
						'name' => __('mqttEnabled',__FILE__),
						'type' => 'info',
						'subtype' => 'binary',
						'isvisible' => 1,
						'restkey' => 'mqttEnabled',

					),
				);

				self::$_infosMap = array(
					'deviceID' => array(
						'name' => __('deviceID',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 1,
						'restkey' => 'deviceID',

					),
					'screenOrientation' => array(
						'name' => __('Orientation écran',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 1,
						'unite' => '°',
						'restkey' => 'screenOrientation',

					),

					'batteryLevel' => array(
						'name' => __('Batterie',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 1,
						'unite' => '%',
						'restkey' => 'batteryLevel',

					),
					'batteryTemperature' => array(
						'name' => __('T° Batterie',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 1,
						'unite' => '°',
						'restkey' => 'batteryTemperature',

					),
					'wifiSignalLevel' => array(
						'name' => __('Niveau Wifi',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 1,
						'restkey' => 'wifiSignalLevel',

					),
					'motionDetectorState' => array(
						'name' => __('Détection mouvement',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 0,
						'restkey' => 'motionDetectorState',

					),
					'displayHeightPixels' => array(
						'name' => __('Résolution écran, hauteur',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 0,
						'restkey' => 'displayHeightPixels',

					),
					'displayWidthPixels' => array(
						'name' => __('Résolution écran, largeur',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 0,
						'restkey' => 'displayWidthPixels',

					),
					'appFreeMemory' => array(
						'name' => __('Mémoire disponible',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 0,
						'restkey' => 'appFreeMemory',

					),
					'appUsedMemory' => array(
						'name' => __('Mémoire utilisée par application',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 0,
						'restkey' => 'appUsedMemory',

					),
					'totalFreeMemory' => array(
						'name' => __('Mémoire disponible totale',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 0,
						'restkey' => 'totalFreeMemory',

					),
					'totalUsedMemory' => array(
						'name' => __('Utilisation mémoire totale',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 0,
						'restkey' => 'totalUsedMemory',

					),
					'currentTabIndex' => array(
						'name' => __('onglet Actuel',__FILE__),
						'type' => 'info',
						'subtype' => 'numeric',
						'isvisible' => 0,
						'restkey' => 'currentTabIndex',

					),
					'communicationStatus' => array(
						'name' => __('Joignable',__FILE__),
						'type' => 'info',
						'subtype' => 'binary',
						'isvisible' => 1,
						//'icon' => '<i class="a-exclamation-triangle"></i>',
						'restkey' => 'communicationStatus',

					),
					'plugged' => array(
						'name' => __('Branché',__FILE__),
						'type' => 'info',
						'subtype' => 'binary',
						'isvisible' => 1,
						//'icon' => '<i class="fa techno-charging"></i>',
						'restkey' => 'plugged',

					),

					'isInScreensaver' => array(
						'name' => __('Screen saver actif',__FILE__),
						'type' => 'info',
						'subtype' => 'binary',
						'isvisible' => 1,
						'restkey' => 'isInScreensaver',

					),
					'kioskMode' => array(
						'name' => __('Mode kiosque',__FILE__),
						'type' => 'info',
						'subtype' => 'binary',
						'isvisible' => 1,
						'restkey' => 'kioskMode',

					),
					'kioskLocked' => array(
						'name' => __('kiosk Locked',__FILE__),
						'type' => 'info',
						'subtype' => 'binary',
						'isvisible' => 1,
						'restkey' => 'kioskLocked',

					),
					'isScreenOn' => array(
						'name' => __('Ecran allumé',__FILE__),
						'type' => 'info',
						'subtype' => 'binary',
						'isvisible' => 1,
						'restkey' => array('isScreenOn', 'screenOn'),// pour les différentes version, à partir de 1.42.2 => isScreenOn est passé à screenOn

					),
					'keyguardLocked' => array(
						'name' => __('Verrouillage keyguard',__FILE__),
						'type' => 'info',
						'subtype' => 'binary',
						'isvisible' => 0,
						'restkey' => 'keyguardLocked',

					),
					'isDeviceAdmin' => array(
						'name' => __('Administrateur tablette',__FILE__),
						'type' => 'info',
						'subtype' => 'binary',
						'isvisible' => 0,
						'restkey' => 'isDeviceAdmin',

					),
					'deviceModel' => array(
						'name' => __('Modèle équipement',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 1,
						'restkey' => 'deviceModel',

					),

					'foregroundApp' => array(
						'name' => __('Application en cours',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 1,
						'restkey' => 'foregroundApp',

					),


					'appVersionName' => array(
						'name' => __('Version',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 0,
						'restkey' => 'appVersionName',

					),

					'ssid' => array(
						'name' => "ssid",
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 0,
						'restkey' => 'ssid',

					),
					'deviceManufacturer' => array(
						'name' => __('Fabricant',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 0,
						'restkey' => 'deviceManufacturer',

					),

					'ip4' => array(
						'name' => "ip",
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 1,
						'restkey' => 'ip4',

					),

					'locationProvider' => array(
						'name' => __('Position',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 0,
						'restkey' => 'locationProvider',

					),
					'locationLongitude' => array(
						'name' => __('Position, Longitude',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 0,
						'restkey' => 'locationLongitude',

					),

					'locationLatitude' => array(
						'name' => __('Postion, Latitude',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 0,
						'restkey' => 'locationLatitude',

					),
					'locationAltitude' => array(
						'name' => __('Position, altitude',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 0,
						'restkey' => 'locationAltitude',

					),
					'screenBrightness' => array(
						'name' => __('Luminosité écran',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 0,
						'restkey' => 'screenBrightness',

					),
					'startUrl' => array(
						'name' => __('Page de démarrage',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 1,
						'restkey' => 'startUrl',

					),

					'currentPage' => array(
						'name' => __('Page courante',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 1,
						'restkey' => 'currentPage',

					),

					'lastAppStart' => array(
						'name' => __('Application démarrée le',__FILE__),
						'type' => 'info',
						'subtype' => 'string',
						'isvisible' => 0,
						'restkey' => 'lastAppStart',

					),

					//	),

				);
			}

			
/*public static function deamon_info() {
	$return = array();
	$return['log'] = __CLASS__;
	$return['launchable'] = 'ok';
	$return['state'] = 'ok';
    
	if (!class_exists('mqtt2')) {
		$return['launchable'] = 'nok';
		$return['state'] = 'nok';
		$return['launchable_message'] = __("Le plugin MQTT Manager n'est pas installé", __FILE__);
	} 
	else 
	{
		if (mqtt2::deamon_info()['state'] != 'ok') {
			$return['launchable'] = 'nok';
			$return['state'] = 'nok';
			$return['launchable_message'] = __("Le démon MQTT Manager n'est pas démarré", __FILE__);
		}
	}
	return $return;
		log::add('fully_kiosk', 'debug' , print_r($return,true));
                
				$return = array();
				$return['log'] = '';
				$return['state'] = 'nok';
				$return['mqttEnabled'] = 'nok';
				$cron = cron::byClassAndFunction('fully_kiosk', 'daemon');
				/*if (is_object($cron) && $cron->running()) {
					$return['state'] = 'ok';
				}
				$dependancy_info = self::dependancy_info();
				if ($dependancy_info['state'] == 'ok') {
					$return['launchable'] = 'ok';
				}
				foreach (eqLogic::byType('fully_fully_kiosk') as $fully_fully_kiosk)
				{
					$mqttEnabled = $fully_fully_kiosk->getConfiguration('mqttEnabled', false);
					if($mqttEnabled){
						$return['mqttEnabled'] = 'ok';
					}
				}
				if($return['mqttEnabled'] = 'nok'){
					//$return['state'] = 'ok';
				}

				return $return;
			}

			public static function deamon_start($_debug = false) {
				self::deamon_stop();
				$deamon_info = self::deamon_info();
				if ($deamon_info['launchable'] != 'ok') {
					throw new Exception(__('Veuillez vérifier la configuration', __FILE__));
				}
				/*if ($deamon_info['mqttEnabled'] != 'ok'){
					//throw new Exception(__('Mqtt non actif sur la tablette', __FILE__));
				}
				$cron = cron::byClassAndFunction('fully_kiosk', 'daemon');
				if (!is_object($cron)) {
					throw new Exception(__('Tache cron introuvable', __FILE__));
				}
				if ($deamon_info['mqttEnabled'] = 'ok'){
					$cron->run();
				}
			}

			public static function deamon_stop() {
				$cron = cron::byClassAndFunction('fully_kiosk', 'daemon');
				if (!is_object($cron)) {
					throw new Exception(__('Tache cron introuvable', __FILE__));
				}
				$cron->halt();
			}

			public static function dependancy_info() {
				$return = array();
				$return['log'] = 'fully_fully_kiosk_dep';
				$return['state'] = 'nok';
				$cmd = "dpkg -l | grep mosquitto";
				exec($cmd, $output, $return_var);
				//lib PHP exist
				$libphp = extension_loaded('mosquitto');
				if ($output[0] != "" && $libphp) {
					$return['state'] = 'ok';
				}
				return $return;
			}

			public static function dependancy_install() {
				log::remove(__CLASS__ . '_dep');
				return array('script' => dirname(__FILE__) . '/../../resources/install.sh ' . jeedom::getTmpFolder('fully_fully_kiosk') . '/dependance', 'log' => log::getPathToLog(__CLASS__ . '_dep'));
			}*/

			/*public static function daemon() {

				if(config::byKey('fully_kioskMQTT', 'fully_kiosk', false) == true){


					log::add('fully_kiosk', 'info', 'Paramètres utilisés, Host : ' . config::byKey('fully_kioskAdress', 'fully_kiosk', '127.0.0.1') . ', Port : ' . config::byKey('fully_kioskPort', 'fully_kiosk', '1883') . ', ID : ' . config::byKey('fully_kioskId', 'fully_kiosk', 'Jeedom'));
					$client = new Mosquitto\Client('fully_kiosk');
					$client->onConnect('fully_kiosk::connect');
					$client->onDisconnect('fully_kiosk::disconnect');
					$client->onSubscribe('fully_kiosk::subscribe');
					$client->onMessage('fully_kiosk::message');
					$client->onLog('fully_kiosk::logmq');
					$client->setWill('/fully_kiosk', "Client died :-(", 1, 0);


					try {
						if (config::byKey('fully_kioskUser', 'fully_kiosk', 'none') != 'none') {
							$client->setCredentials(config::byKey('fully_kioskUser', 'fully_kiosk'), config::byKey('fully_kioskPass', 'fully_kiosk'));
						}


						$client->connect(config::byKey('fully_kioskAdress', 'fully_kiosk', '127.0.0.1'), config::byKey('fully_kioskPort', 'fully_kiosk', '1883'), 60);




						$topic = 'fully/event/#'; //.config::byKey('deviceID', 'fully_kiosk', '').'/#'; self::byLogicalId('deviceID', 'fully_kiosk');
						//$topic = 'fully/event/' . $fully_kiosk->getCmd('info', 'deviceID') . '/#';
						log::add('fully_kiosk', 'debug', 'Subscribe to topic ' . $topic);
						//$client->subscribe(config::byKey('fully_kioskTopic', 'fully_kiosk', $topic , config::byKey('fully_kioskQos', 'fully_kiosk', 1)); // !auto: Subscribe to root topic
						$client->subscribe(config::byKey('fully_kioskTopic', 'fully_kiosk', $topic), config::byKey('fully_kioskQos', 'fully_kiosk', 1)); // !auto: Subscribe to root topic
						//$client->subscribe(config::byKey('fully_kioskTopic', 'fully_kiosk', 'fully/event/'.config::byKey('deviceID', 'fully_kiosk', '').'/#', config::byKey('fully_kioskQos', 'fully_kiosk', 1)); // !auto: Subscribe to root topic
						log::add('fully_kiosk', 'debug', 'Subscribe to topic ' . config::byKey('fully_kioskTopic', 'fully_kiosk', '#'));
						//$client->loopForever();
						while (true) { $client->loop(); }
					}
					catch (Exception $e){
						log::add('fully_kiosk', 'error', $e->getMessage());
					}


				} else {
					log::add('fully_kiosk', 'debug', ' No active MQTT, deamon automatic start disabled  ' );
					config::save('deamonAutoMode', 0, 'fully_kiosk');
					log::add('fully_kiosk', 'debug', ' No active MQTT, Daemon stopped  ' );
					self::deamon_stop();
				}


			}*/

			public static function connect( $r, $message ) {
				log::add('fully_kiosk', 'info', 'Connexion à Mosquitto avec code ' . $r . ' ' . $message);
				config::save('status', '1',  'fully_kiosk');
			}

			public static function disconnect( $r ) {
				log::add('fully_kiosk', 'debug', 'Déconnexion de Mosquitto avec code ' . $r);
				config::save('status', '0',  'fully_kiosk');
			}

			public static function subscribe( ) {
				log::add('fully_kiosk', 'debug', 'Subscribe to topics');
			}

			public static function logmq( $code, $str ) {
				if (strpos($str,'PINGREQ') === false && strpos($str,'PINGRESP') === false) {
					log::add('fully_kiosk', 'debug', $code . ' : ' . $str);
				}
			}

			public static function message( $message ) {
				$json = json_decode($message->payload,true);
				if(!is_null($json) && !is_null($json['event']) && !is_null($json['deviceId']) ){

					log::add('fully_kiosk', 'debug', 'Message ' . $message->payload . ' sur ' . $message->topic . $json->deviceID . $json->event );
					//$fully_kioskCmd = $this->getCmd('info', $cmdLogicalId);

					$eqlogic = self::byLogicalId($json['deviceId'], 'fully_kiosk');

					$fully_kioskCmd = $eqlogic->getCmd('info', $json['event']);

					if (!is_object($fully_kioskCmd))
					{
						log::add('fully_kiosk', 'debug', __METHOD__.' '.__LINE__.' cmdInfo create '.$cmdLogicalId.'('.__($params['name'], __FILE__).') '.($params['subtype'] ?: 'subtypedefault'));
						$fully_kioskCmd = new fully_kioskCmd();

						$fully_kioskCmd->setLogicalId($json['event']);
						$fully_kioskCmd->setEqLogic_id($eqlogic->getId());
						$fully_kioskCmd->setName('mqtt'.$json['event']);
						$fully_kioskCmd->setType('info');
						$fully_kioskCmd->setSubType('string');
						$fully_kioskCmd->setValue(date('y/m/d h:i:s'));
						$fully_kioskCmd->setIsVisible(0);

						$eqlogic->checkAndUpdateCmd($json['event'],date('y/m/d h:i:s'));
						$fully_kioskCmd->save();
					}else{
						log::add('fully_kiosk', 'debug', 'Event received:' .  $json['event'] . ' ' . date('y/m/d h:i:s'));
						//$fully_kioskCmd->setValue(date('h:i:s'));
						//$fully_kioskCmd->setName('mqtt'.$json['event']);
						$eqlogic->checkAndUpdateCmd($json['event'],date('y/m/d h:i:s'));
						//$fully_kioskCmd->save();
					}
					// update info from mqtt event value if found

					if($json['event'] == 'onBatteryLevelChanged'){
						$eqlogic->checkAndUpdateCmd('batteryLevel',intval($json['level']));
						$eqlogic->refreshWidget();
					}

					if($json['event'] == 'screenOn'){
						$eqlogic->checkAndUpdateCmd('isScreenOn',1);
						$eqlogic->refreshWidget();
					}

					if($json['event'] == 'screenOff'){
						$eqlogic->checkAndUpdateCmd('isScreenOn',0);
						$eqlogic->refreshWidget();
					}
					if($json['event'] == 'pluggedUSB' or $json['event'] == 'pluggedAC' or $json['event'] == 'pluggedWireless' ){
						$eqlogic->checkAndUpdateCmd('plugged',1);
						$eqlogic->refreshWidget();
					}

					if($json['event'] == 'unplugged'){
						$eqlogic->checkAndUpdateCmd('plugged',0);
						$eqlogic->refreshWidget();
					}


				}

			}


			// end add daemon for mqtt

			public static function cron() {
				$notfound = true;
				foreach (eqLogic::byType('fully_kiosk') as $fully_kiosk)
				{
					if($fully_kiosk->getConfiguration('refreshDelay')=='1'){
						$notfound = false;
						$fully_kiosk->getInformations();
						$fully_kiosk->refreshWidget();
					}
				}
				if($notfound){ config::save('functionality::cron::enable', 0 ,'fully_kiosk'); }

			}

			/*
			* Fonction exécutée automatiquement toutes les heures par Jeedom
			public static function cronHourly() {

		}
		*/

		//* Fonction exécutée automatiquement tous les jours par Jeedom
		public static function cron5() {
			$notfound = true;
			foreach (eqLogic::byType('fully_kiosk') as $fully_kiosk)
			{
				if($fully_kiosk->getConfiguration('refreshDelay')=='5'){
					$notfound = false;
					$fully_kiosk->refreshWidget();
				}
			}
			if($notfound){ config::save('functionality::cron5::enable', 0 ,'fully_kiosk'); }
		}

		//* Fonction exécutée automatiquement tous les jours par Jeedom
		public static function cron30() {
			$notfound = true;
			foreach (eqLogic::byType('fully_kiosk') as $fully_kiosk)
			{
				if($fully_kiosk->getConfiguration('refreshDelay')=='30'){
					$notfound = false;
					$fully_kiosk->getInformations();
					$fully_kiosk->refreshWidget();
				}
			}
			if($notfound){ config::save('functionality::cron30::enable', 0 ,'fully_kiosk'); }

		}
		//* Fonction exécutée automatiquement tous les jours par Jeedom
		public static function cronHourly() {
			$notfound = true;
			foreach (eqLogic::byType('fully_kiosk') as $fully_kiosk)
			{
				if($fully_kiosk->getConfiguration('refreshDelay')=='60'){
					$notfound = false;
					$fully_kiosk->getInformations();
					$fully_kiosk->refreshWidget();
				}
			}
			if($notfound){ config::save('functionality::cronHourly::enable', 0 ,'fully_kiosk'); }

		}

		//* Fonction exécutée automatiquement tous les jours par Jeedom
		public static function cron15() {
			$notfound = true;
			foreach (eqLogic::byType('fully_kiosk') as $fully_kiosk)
			{
				if($fully_kiosk->getConfiguration('refreshDelay')=='15'){
					$notfound = false;
					$fully_kiosk->getInformations();
					$fully_kiosk->refreshWidget();
				}
			}
			if($notfound){ config::save('functionality::cron15::enable', 0 ,'fully_kiosk');}

		}

		/*     * *********************Méthodes d'instance************************* */

		public function refresh() {
			try {
				$this->getInformations();
				$fully_kiosk->refreshWidget();
			} catch (Exception $exc) {
				log::add('fully_kiosk', 'error', __('Erreur pour ', __FILE__) . $eqLogic->getHumanName() . ' : ' . $exc->getMessage());
			}
		}

		public function getInformations($jsondata=null)
		{
			if ($this->getIsEnable() == 1)
			{
				$equipement = $this->getName();

				//if(is_null($jsondata))
				//{
				$ip = $this->getConfiguration('addressip');
				$password = $this->getConfiguration('password');
				$port = $this->getConfiguration('port', intval('2323'));

				$url = "http://{$ip}:".$port."/?type=json&cmd=deviceInfo&password=".$password;
				log::add('fully_kiosk', 'debug', __METHOD__.' '.__LINE__.' requesting '.$url);

				//$jsondata = file_get_contents($url);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 15);
				$jsondata = curl_exec($ch);
				curl_close($ch);
				//}

				log::add('fully_kiosk', 'debug', __METHOD__.' '.__LINE__.' $jsondata '.$jsondata);

				$json = json_decode($jsondata,true);

				if (is_null($json))
				{
					log::add('fully_kiosk', 'info', 'Connexion KO for '.$equipement.' ('.$ip.')');
					$this->checkAndUpdateCmd('communicationStatus',false);

					return false;
				}

				$this->checkAndUpdateCmd('communicationStatus',true);

				self::initInfosMap();


				//update cmdinfo value
				foreach(self::$_infosMap as $cmdLogicalId=>$params)
				{	
					if(!isset($params['restkey']))continue;

					if(!is_array($params['restkey'])){
						if(!isset($json[$params['restkey']]))continue;// si string et que pas défini ds le json on continue
						
						$value = $json[$params['restkey']];
					}else{// c'est un array
						log::add('fully_kiosk', 'debug', $cmdLogicalId.' is an array '.implode(',',$params['restkey']));
						foreach($params['restkey'] as $restKey){// on cherche parmi toutes les valeurs si une existe 
							if(isset($json[$restKey])){// siexiste ds le jsopn
								$value = $json[$restKey];// on valorise la valeur
								continue;//on sort de la boucle
							}
						}
					}

					if(isset($value))// si on a trouvé une valeur au dessus correspondant à un eentrée du json
					{
						//log::add('fully_kiosk', 'debug',  __METHOD__.' '.__LINE__.' '.$cmdLogicalId.' => '.json_encode($json[$params['restkey']]));
						str_replace("\\n", " ", $value);
						if(isset($params['cbTransform']) && is_callable($params['cbTransform']))
						{
							$value = call_user_func($params['cbTransform'], $value);
							//log::add('fully_kiosk', 'debug', __METHOD__.' '.__LINE__.' Transform to => '.json_encode($value));
						}
						$this->checkAndUpdateCmd($cmdLogicalId,$value);
					}
				}
				if($this->getLogicalId() == '' or $this->getLogicalId() !=  $json['deviceID'] )
				{
					$this->setLogicalId($json['deviceID']);
					$this->save();
				}
				//update settings value
				$ip = $this->getConfiguration('addressip');
				$password = $this->getConfiguration('password');
				$port = $this->getConfiguration('port', intval('2323'));

				$url = "http://{$ip}:".$port."/?type=json&cmd=listSettings&password=".$password;
				log::add('fully_kiosk', 'debug', __METHOD__.' '.__LINE__.' requesting '.$url);

				//$jsondata = file_get_contents($url);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 15);
				$jsondata = curl_exec($ch);
				curl_close($ch);
				//}



				$json = json_decode($jsondata,true);
				log::add('fully_kiosk', 'debug', __METHOD__.' '.__LINE__.' $mqtt new'.$json['mqttEnabled'] . ' old' . $this->getConfiguration('mqttEnabled'));

				if($this->getConfiguration('mqttEnabled') != $json['mqttEnabled'])
				{
					$this->setConfiguration('mqttEnabled',$json['mqttEnabled']);
					$this->save();
				}
				return true;
			}
		}

		public function postSave() {
			self::initInfosMap();
			$order = 0;
			if(config::byKey('fully_kioskMQTT', 'fully_kiosk', false) == false){
				log::add('fully_kiosk', 'debug', ' No active MQTT, Daemon stopped  ' );
				self::deamon_stop();
			}


			switch ($this->getConfiguration('refreshDelay','')){
				case '1' : config::save('functionality::cron::enable', 1 ,'fully_kiosk'); break;
				case '5' : config::save('functionality::cron5::enable', 1 ,'fully_kiosk'); break;
				case '15' : config::save('functionality::cron15::enable', 1 ,'fully_kiosk'); break;
				case '30' : config::save('functionality::cron30::enable', 1 ,'fully_kiosk'); break;
				case '60' : config::save('functionality::cronHourly::enable', 1 ,'fully_kiosk'); break;
			}

			//Cmd Infos
			foreach(self::$_infosMap as $cmdLogicalId=>$params)
			{
				$fully_kioskCmd = $this->getCmd('info', $cmdLogicalId);

				if (!is_object($fully_kioskCmd))
				{
					log::add('fully_kiosk', 'debug', __METHOD__.' '.__LINE__.' cmdInfo create '.$cmdLogicalId.'('.__($params['name'], __FILE__).') '.($params['subtype'] ?: 'subtypedefault'));
					$fully_kioskCmd = new fully_kioskCmd();

					$fully_kioskCmd->setLogicalId($cmdLogicalId);
					$fully_kioskCmd->setEqLogic_id($this->getId());
					$fully_kioskCmd->setName(__($params['name'], __FILE__));
					$fully_kioskCmd->setType(isset($params['type']) ?$params['type']: 'info');
					$fully_kioskCmd->setSubType(isset($params['subtype']) ?$params['subtype']: 'numeric');
					$fully_kioskCmd->setIsVisible(isset($params['isvisible']) ?$params['isvisible']: 0);
					$fully_kioskCmd->setDisplay('icon', isset($params['icon']) ?$params['icon']: null);

					$fully_kioskCmd->setConfiguration('cmd', isset($params['cmd']) ?$params['cmd']: null);
					$fully_kioskCmd->setDisplay('forceReturnLineBefore', isset($params['forceReturnLineBefore']) ?$params['forceReturnLineBefore']: false);

					if(isset($params['unite']))
					$fully_kioskCmd->setUnite($params['unite']);
					$fully_kioskCmd->setTemplate('dashboard',isset($params['tpldesktop'])?$params['tpldesktop']: 'default');
					$fully_kioskCmd->setTemplate('mobile',isset($params['tplmobile'])?$params['tplmobile']: 'default');
					$fully_kioskCmd->setOrder($order++);

					$fully_kioskCmd->save();
				}elseif($fully_kioskCmd->getConfiguration('restKey','') != '') {

					$fully_kioskCmd->setConfiguration('restKey', $params['restKey'] ?: null);
					$fully_kioskCmd->save();

				}


			}

			//Cmd Actions
			foreach(self::$_actionMap as $cmdLogicalId => $params)
			{
				$fully_kioskCmd = $this->getCmd('action', $cmdLogicalId);
				if(is_object($fully_kioskCmd) && $fully_kioskCmd->getConfiguration('cmd','') != $params['cmd']) {
					$fully_kioskCmd->remove();
				}

				if (!is_object($fully_kioskCmd))
				{
					log::add('fully_kiosk', 'debug', __METHOD__.' '.__LINE__.' cmdAction create '.$cmdLogicalId.'('.__($params['name'], __FILE__).') '.($params['subtype'] ?: 'subtypedefault'));
					$fully_kioskCmd = new fully_kioskCmd();

					$fully_kioskCmd->setLogicalId($cmdLogicalId);
					$fully_kioskCmd->setEqLogic_id($this->getId());
					$fully_kioskCmd->setName(__($params['name'], __FILE__));
					$fully_kioskCmd->setType(isset($params['type']) ?$params['type']: 'action');
					$fully_kioskCmd->setSubType(isset($params['subtype'] )?$params['subtype']: 'other');
					$fully_kioskCmd->setIsVisible(isset($params['isvisible']) ?$params['isvisible']: 1);
					$fully_kioskCmd->setConfiguration('cmd', isset($params['cmd']) ?$params['cmd']: null);


					$fully_kioskCmd->setConfiguration('listValue', json_encode(isset($params['listValue']) ?$params['listValue']: ''));

					$fully_kioskCmd->setDisplay('forceReturnLineBefore', isset($params['forceReturnLineBefore']) ?$params['forceReturnLineBefore']: false);
					$fully_kioskCmd->setDisplay('message_disable', isset($params['message_disable']) ?$params['message_disable']: false);
					$fully_kioskCmd->setDisplay('title_disable', isset($params['title_disable']) ?$params['title_disable']: false);
					$fully_kioskCmd->setDisplay('title_placeholder', isset($params['title_placeholder']) ?$params['title_placeholder']: false);
					$fully_kioskCmd->setDisplay('icon', isset($params['icon']) ?$params['icon']: false);
					$fully_kioskCmd->setDisplay('message_placeholder', isset($params['message_placeholder']) ?$params['message_placeholder']: false);

					$fully_kioskCmd->setDisplay('title_possibility_list', json_encode(isset($params['title_possibility_list']) ?$params['title_possibility_list']: null));//json_encode(array("1","2"));
					$fully_kioskCmd->setDisplay('icon', isset($params['icon']) ?$params['icon']: null);

					if(isset($params['tpldesktop']))
					$fully_kioskCmd->setTemplate('dashboard',isset($params['tpldesktop']));
					if(isset($params['tplmobile']))
					$fully_kioskCmd->setTemplate('mobile',isset($params['tplmobile']));
					$fully_kioskCmd->setOrder($order++);

					if(isset($params['linkedInfo']))
					$fully_kioskCmd->setValue($this->getCmd('info', $params['linkedInfo']));

					$fully_kioskCmd->save();
				} elseif($fully_kioskCmd->getConfiguration('cmd','') != '') {
					$fully_kioskCmd->setConfiguration('cmd', $params['cmd'] ?: null);
					$fully_kioskCmd->setLogicalId($cmdLogicalId);
					$fully_kioskCmd->setEqLogic_id($this->getId());
					$fully_kioskCmd->setName(__($params['name'], __FILE__));
					$fully_kioskCmd->setType(isset($params['type']) ?$params['type']: 'action');
					$fully_kioskCmd->setSubType(isset($params['subtype']) ?$params['subtype']: 'other');
					$fully_kioskCmd->setConfiguration('cmd', isset($params['cmd']) ?$params['cmd']: null);
					$fully_kioskCmd->setConfiguration('listValue', isset($params['listValue'])?json_encode($params['listValue']): '');
					$fully_kioskCmd->setDisplay('forceReturnLineBefore', isset($params['forceReturnLineBefore']) ?$params['forceReturnLineBefore']: false);
					$fully_kioskCmd->setDisplay('message_disable', isset($params['message_disable'])?$params['message_disable']: false);
					$fully_kioskCmd->setDisplay('title_disable', isset($params['title_disable']) ?$params['title_disable']: false);
					$fully_kioskCmd->setDisplay('title_placeholder', isset($params['title_placeholder']) ?$params['title_placeholder']: false);
					$fully_kioskCmd->setDisplay('icon', isset($params['icon'])?$params['icon']: false);
					$fully_kioskCmd->setDisplay('message_placeholder', isset($params['message_placeholder']) ?$params['message_placeholder']: false);
					$fully_kioskCmd->setDisplay('title_possibility_list', json_encode(isset($params['title_possibility_list']) ?$params['title_possibility_list']: null));//json_encode(array("1","2"));
					$fully_kioskCmd->save();
				}
			}
		}


		public function toHtml($_version = 'dashboard') {
			$replace = $this->preToHtml($_version);
			if (!is_array($replace)) {
				return $replace;
			}
			$version = jeedom::versionAlias($_version);
			$cmd_html = '';
			$br_before = 1;
			foreach ($this->getCmd('info', null, true) as $cmd) {
				if (isset($replace['#refresh_id#']) && $cmd->getId() == $replace['#refresh_id#']) {
					continue;
				}

				if ($br_before == 0 && $cmd->getDisplay('forceReturnLineBefore', 0) == 1) {
					$cmd_html .= '<br/>';
				}
				$cmd_html .= $cmd->toHtml($_version, '', null);
				//log::add('fully_kiosk', 'debug', ' cmdAction to html '. $cmd->toHtml($_version, '', $replace['#cmd-background-color#']));
				$br_before = 0;
				if ($cmd->getDisplay('forceReturnLineAfter', 0) == 1) {
					$cmd_html .= '<br/>';
					$br_before = 1;
				}

			}
			foreach ($this->getCmd('action', null, true) as $cmd) {
				if($cmd->getSubType() != 'message' ){
					if (isset($replace['#refresh_id#']) && $cmd->getId() == $replace['#refresh_id#'] ) {
						continue;
					}
					if ($br_before == 0 && $cmd->getDisplay('forceReturnLineBefore', 0) == 1) {
						$cmd_html .= '<br/>';
					}
					$cmd_html .= $cmd->toHtml($_version, '', null);

					//log::add('fully_kiosk', 'debug', ' cmdAction to html '. $cmd->toHtml($_version, '', $replace['#cmd-background-color#']));
					$br_before = 0;
					if ($cmd->getDisplay('forceReturnLineAfter', 0) == 1) {
						$cmd_html .= '<br/>';
						$br_before = 1;
					}
				}
			}

			// uniquement avec titre
			$cmd_html .= '<br/>';
			foreach ($this->getCmd('action', null, true) as $cmd) {
				if($cmd->getSubType() == 'message'  && $cmd->getDisplay('message_disable', 0) == 1){
					if (isset($replace['#refresh_id#']) && $cmd->getId() == $replace['#refresh_id#'] ) {
						continue;
					}
					if ($br_before == 0 && $cmd->getDisplay('forceReturnLineBefore', 0) == 1) {
						$cmd_html .= '<br/>';
					}
					$cmd_html .= $cmd->toHtml($_version, '', null) ;

					//log::add('fully_kiosk', 'debug', ' cmdAction to html '. $cmd->toHtml($_version, '', $replace['#cmd-background-color#']));
					$br_before = 0;
					if ($cmd->getDisplay('forceReturnLineAfter', 0) == 1) {
						$cmd_html .= '<br/>';
						$br_before = 1;
					}
				}
			}
			// action message complet
			$cmd_html .= '<br/>';
			foreach ($this->getCmd('action', null, true) as $cmd) {
				if($cmd->getSubType() == 'message'  && $cmd->getDisplay('message_disable', 0) != 1){
					if (isset($replace['#refresh_id#']) && $cmd->getId() == $replace['#refresh_id#'] ) {
						continue;
					}
					if ($br_before == 0 && $cmd->getDisplay('forceReturnLineBefore', 0) == 1) {
						$cmd_html .= '<br/>';
					}
					$cmd_html .= $cmd->toHtml($_version, '', null);

					//log::add('fully_kiosk', 'debug', ' cmdAction to html '. $cmd->toHtml($_version, '', $replace['#cmd-background-color#']));
					$br_before = 0;
					if ($cmd->getDisplay('forceReturnLineAfter', 0) == 1) {
						$cmd_html .= '<br/>';
						$br_before = 1;
					}
				}
			}


			//$eqlogic = $cmd->getEqLogic();
			$ip = $this->getConfiguration('addressip');
			$password = $this->getConfiguration('password');

			$replace['#cmd#'] = $cmd_html;
			$replace['#ipaddress#'] = $ip;
			$replace['#password#'] = $password;

			return template_replace($replace, getTemplate('core', $version, 'fully_kiosk', 'fully_kiosk'));
		}

		/*     * **********************Getteur Setteur*************************** */
	}

	class fully_kioskCmd extends cmd {
		/*     * *************************Attributs****************************** */

		/*     * ***********************Methode static*************************** */

		/*     * *********************Methode d'instance************************* */

		/*
		* Non obligatoire permet de demander de ne pas supprimer les commandes même si elles ne sont pas dans la nouvelle configuration de l'équipement envoyé en JS
		public function dontRemoveCmd() {
		return true;
	}
	*/
	public function execute($_options = array())
	{
		log::add('fully_kiosk', 'debug', __METHOD__.'('.json_encode($_options).') Type: '.$this->getType().' logicalId: '.$this->getLogicalId());

		if ($this->getLogicalId() == 'refresh')
		{
			$this->getEqLogic()->refresh();
			return;
		}

		if( $this->getType() == 'action' )
		{

			if( $this->getSubType() == 'slider' && $_options['slider'] == '')
			return;

			fully_kiosk::initInfosMap();
			$command = $this->getConfiguration('cmd','');
			if (isset(fully_kiosk::$_actionMap[$this->getLogicalId()]) || $command != '')
			{
				$params = fully_kiosk::$_actionMap[$this->getLogicalId()];

				if(isset($params['callback']) && is_callable($params['callback']))
				{
					log::add('fully_kiosk', 'debug', __METHOD__.'calling back');
					call_user_func($params['callback'], $this);
				}elseif(isset($params['cmd']) || $command != '')
				{
					$cmdval = $params['cmd'];
					$cmdval = $this->getConfiguration('cmd');
					if($this->getSubType() == 'slider')
					$cmdval = str_replace('[[[VALUE]]]',$_options['slider'],$cmdval);

					if($this->getLogicalId()  == 'setAudioVolume'){
						$cmdval = str_replace('#message#',intval($_options['message']),$cmdval);
						if ($_options['title'] === ""){ $_options['title'] = 3 ; }
						$stream[0] = '3';
						$stream = explode(" ", $_options['title']);
						$cmdval = str_replace('#title#',intval($stream[0]),$cmdval);
					}


					if($this->getLogicalId()  == 'TTS_javascript'){
						if($_options['title'] === "" ){ $_options['title'] = 'fr_FR' ;}
						$cmdval = str_replace('#title#', urlencode($_options['title']),$cmdval);
						$cmdval = str_replace('#message#', urlencode(str_replace("'","\'", $_options['message'])),$cmdval);
					}

					if($this->getLogicalId()  == 'javascript'){
						$cmdval = str_replace('#title#',urlencode($_options['title']),$cmdval);
						$cmdval = str_replace('#message#',urlencode(str_replace("'","\'",$_options['message'])),$cmdval);
					}
					if($this->getLogicalId()  == 'playSound'){
						$cmdval = str_replace('#title#',urlencode($_options['title']),$cmdval);
						$cmdval = str_replace('#message#',urlencode(str_replace("'","\'",$_options['message'])),$cmdval);
					}

					if($this->getSubType()  == 'message') {
						$cmdval = str_replace('#message#',urlencode($_options['message']),$cmdval);
						if($this->getLogicalId()  == 'textToSpeech2'){
							$cmdval = str_replace('#title#',$_options['title'],$cmdval);
						}
						else
						{
							$cmdval = str_replace('#title#',urlencode($_options['title']),$cmdval);
						}
						if($this->getLogicalId()  == 'setBooleanSetting')
						$cmdval = str_replace('#message#',$_options['message'] === 'true',$cmdval);

					}
					$eqLogic = $this->getEqLogic();
					$ip = $eqLogic->getConfiguration('addressip');
					$password = $eqLogic->getConfiguration('password');
					$port = $eqLogic->getConfiguration('port', intval('2323'));
					$url = 'http://'.$ip.':'.$port.'/?cmd='.$cmdval.'&password='.$password;

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS,$cmdval);
					$jsondata = curl_exec($ch);


					if($this->getLogicalId()  == 'getCamshot'){

						$resource_path = realpath(dirname(__FILE__) . '/../../resources/');

						if($_options['title'] == ''){
							$path = $resource_path;
						} else
						{
							$path = $_options['title'];
						}


						if($_options['message'] == ''){
							$camshot = $path.'/camshot.jpg';
						} else
						{
							$camshot = $path.'/'.$_options['message'];
						}
						file_put_contents($camshot, $jsondata);
					}

					curl_close($ch);
					log::add('fully_kiosk', 'debug', __METHOD__.'('.$url.' with '.$cmdval.') '.$jsondata);

					$eqLogic->getInformations($jsondata);
				}

				return true;
			}
		} else {
			throw new Exception(__('Commande non implémentée actuellement', __FILE__));
		}
		return false;
	}

	/*     * **********************Getteur Setteur*************************** */
}
/*
*/
?>
