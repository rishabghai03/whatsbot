<?php
	require_once __DIR__ . '/Core.php';

	class StorageListener extends WhatsBotListenerCore
	{
		protected function Load()
		{ }

		private function Log(WhatsApp\Message $Message) // Needed? Meeemory xD
		{
			return $Message->Log();
		}

		############
		# Messages #
		############

		# Text

		public function onGetMessage($Me, $From, $ID, $Type, $Time, $Name, $Text)
		{
			$this->Log(new WhatsApp\TextMessage($Me, $From, $From, $ID, $Type, $Time, $Name, $Text));
		}

		public function onGetGroupMessage($Me, $From, $User, $ID, $Type, $Time, $Name, $Text)
		{
			$this->Log(new WhatsApp\TextMessage($Me, $From, $User, $ID, $Type, $Time, $Name, $Text));
		}

		# Media

		public function onGetAudio($Me, $From, $ID, $Type, $Time, $Name, $Size, $URL, $File, $MIME, $Hash, $Duration, $Codec, $User = null)
		{
			$User = $User == null ? $From : $User;

			$this->Log(new WhatsApp\AudioMessage($Me, $From, $User, $ID, $Type, $Time, $Name, $URL, $File, $Size, $MIME, $Hash, $Duration, $Codec));
		}

		public function onGetImage($Me, $From, $ID, $Type, $Time, $Name, $Size, $URL, $File, $MIME, $Hash, $Width, $Height, $Preview, $Caption)
		{
			$this->Log(new WhatsApp\ImageMessage($Me, $From, $From, $ID, $Type, $Time, $Name, $URL, $File, $Size, $MIME, $Hash, $Width, $Height, $Preview, $Caption));
		}

		public function onGetGroupImage($Me, $From, $User, $ID, $Type, $Time, $Name, $Size, $URL, $File, $MIME, $Hash, $Width, $Height, $Preview, $Caption)
		{
			$this->Log(new WhatsApp\ImageMessage($Me, $From, $User, $ID, $Type, $Time, $Name, $URL, $File, $Size, $MIME, $Hash, $Width, $Height, $Preview, $Caption));
		}

		public function onGetLocation($Me, $From, $ID, $Type, $Time, $Name, $Author, $Longitude, $Latitude, $URL, $Preview, $User)
		{
			$User = $User == null ? $From : $User;

			$this->Log(new WhatsApp\LocationMessage($Me, $From, $User, $ID, $Type, $Time, $Name, $URL, $Author, $Longitude, $Latitude, $Preview));
		}

		public function onGetVideo($Me, $From, $ID, $Type, $Time, $Name, $URL, $File, $Size, $MIME, $Hash, $Duration, $VCodec, $ACodec, $Preview, $Caption, $Width, $Height, $FPS, $VBitRate, $ASampleFrequency, $ASampleFormat, $ABitRate)
		{
			$this->Log(new WhatsApp\VideoMessage($Me, $From, $From, $ID, $Type, $Time, $Name, $URL, $File, $Size, $MIME, $Hash, $Duration, $Preview, $Caption, $Width, $Height, $FPS, $VCodec, $VBitRate, $ACodec, $ABitRate, $ASampleFrequency, $ASampleFormat));
		}

		public function onGetGroupVideo($Me, $From, $User, $ID, $Type, $Time, $Name, $URL, $File, $Size, $MIME, $Hash, $Duration, $VCodec, $ACodec, $Preview, $Caption, $Width, $Height, $FPS, $VBitRate, $ASampleFrequency, $ASampleFormat, $ABitRate)
		{
			$this->Log(new WhatsApp\VideoMessage($Me, $From, $User, $ID, $Type, $Time, $Name, $URL, $File, $Size, $MIME, $Hash, $Duration, $Duration, $Preview, $Caption, $Width, $Height, $FPS, $VCodec, $VBitRate, $ACodec, $ABitRate, $ASampleFrequency, $ASampleFormat));
		}

		public function onGetvCard($Me, $From, $ID, $Type, $Time, $Name, $vCardName, $vCard, $User)
		{
			$User = $User == null ? $From : $User;

			$this->Log(new WhatsApp\vCardMessage($Me, $From, $User, $ID, $Type, $Time, $Name, $vCardName, $vCard));
		}

		/* Events: 
		 * public function onClose($mynumber, $error) {}
	     * public function onCodeRegister($mynumber, $login, $password, $type, $expiration, $kind, $price, $cost, $currency, $price_expiration) {}
	     * public function onCodeRegisterFailed($mynumber, $status, $reason, $retry_after) {}
	     * public function onCodeRequest($mynumber, $method, $length) {}
	     * public function onCodeRequestFailed($mynumber, $method, $reason, $param) {}
	     * public function onCodeRequestFailedTooRecent($mynumber, $method, $reason, $retry_after) {}
	     * public function onCodeRequestFailedTooManyGuesses($mynumber, $method, $reason, $retry_after) {}
	     * public function onConnect($mynumber, $socket) {}
	     * public function onConnectError($mynumber, $socket) {}
	     * public function onCredentialsBad($mynumber, $status, $reason) {}
	     * public function onCredentialsGood($mynumber, $login, $password, $type, $expiration, $kind, $price, $cost, $currency, $price_expiration) {}
	     * public function onDisconnect($mynumber, $socket) {}
	     * public function onDissectPhone($mynumber, $phonecountry, $phonecc, $phone, $phonemcc, $phoneISO3166, $phoneISO639, $phonemnc) {}
	     * public function onDissectPhoneFailed($mynumber) {}
	     * public function onGetBroadcastLists($mynumber, $broadcastLists){}
	     * public function onGetError($mynumber, $from, $id, $data) {}
	     * public function onGetExtendAccount($mynumber, $kind, $status, $creation, $expiration) {}
	     * public function onGetFeature($mynumber, $from, $encrypt) {}
	     * public function onGetGroupParticipants($mynumber, $groupId, $groupList) {}
	     * public function onGetGroups($mynumber, $groupList) {}
	     * public function onGetGroupsInfo($mynumber, $groupList) {}
	     * public function onGetGroupV2Info( $mynumber, $group_id, $creator, $creation, $subject, $participants, $admins, $fromGetGroup ){}
	     * public function onGetGroupsSubject($mynumber, $group_jid, $time, $author, $name, $subject) {}
	     * public function onGetKeysLeft($mynumber, $keysLeft) {}
	     * public function onGetNormalizedJid($mynumber, $data) {}
	     * public function onGetPrivacyBlockedList($mynumber, $data) {}
	     * public function onGetProfilePicture($mynumber, $from, $type, $data) {}
	     * public function onGetReceipt($from, $id, $offline, $retry) {}
	     * public function onGetRequestLastSeen($mynumber, $from, $id, $seconds) {}
	     * public function onGetServerProperties($mynumber, $version, $props) {}
	     * public function onGetServicePricing($mynumber, $price, $cost, $currency, $expiration) {}
	     * public function onGetStatus($mynumber, $from, $requested, $id, $time, $data) {}
	     * public function onGetSyncResult($result) {}
	     * public function onGroupCreate($mynumber, $groupId) {}
	     * public function onGroupisCreated($mynumber, $creator, $gid, $subject, $admin, $creation, $members = array()) {}
	     * public function onGroupsChatCreate($mynumber, $gid) {}
	     * public function onGroupsChatEnd($mynumber, $gid) {}
	     * public function onGroupsParticipantsAdd($mynumber, $groupId, $jid) {}
	     * public function onGroupsParticipantsPromote($myNumber, $groupJID, $time, $issuerJID, $issuerName, $promotedJIDs = array()) {}
	     * public function onGroupsParticipantsRemove($mynumber, $groupId, $jid) {}
	     * public function onLogin($mynumber) {}
	     * public function onLoginFailed($mynumber, $data) {}
	     * public function onLoginSuccess($mynumber, $kind, $status, $creation, $expiration) {}
	     * public function onAccountExpired($mynumber, $kind, $status, $creation, $expiration ){}
	     * public function onMediaMessageSent($mynumber, $to, $id, $filetype, $url, $filename, $filesize, $filehash, $caption, $icon) {}
	     * public function onMediaUploadFailed($mynumber, $id, $node, $messageNode, $statusMessage) {}
	     * public function onMessageComposing($mynumber, $from, $id, $type, $time) {}
	     * public function onMessagePaused($mynumber, $from, $id, $type, $time) {}
	     * public function onMessageReceivedClient($mynumber, $from, $id, $type, $time, $participant) {}
	     * public function onMessageReceivedServer($mynumber, $from, $id, $type, $time) {}
	     * public function onPaidAccount($mynumber, $author, $kind, $status, $creation, $expiration) {}
	     * public function onPaymentRecieved($mynumber, $kind, $status, $creation, $expiration) {}
	     * public function onPresenceAvailable($mynumber, $from) {}
	     * public function onPresenceUnavailable($mynumber, $from, $last) {}
	     * public function onProfilePictureChanged($mynumber, $from, $id, $time) {}
	     * public function onProfilePictureDeleted($mynumber, $from, $id, $time) {}
	     * public function onSendMessage($mynumber, $target, $messageId, $node) {}
	     * public function onSendMessageReceived($mynumber, $id, $from, $type) {}
	     * public function onSendPong($mynumber, $msgid) {}
	     * public function onSendPresence($mynumber, $type, $name ) {}
	     * public function onSendStatusUpdate($mynumber, $txt ) {}
	     * public function onStreamError($data) {}
	     * public function onUploadFile($mynumber, $filename, $url) {}
	     * public function onUploadFileFailed($mynumber, $filename) {}
		 */
	}
