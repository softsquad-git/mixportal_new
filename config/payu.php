<?php


//set Sandbox Environment
OpenPayU_Configuration::setEnvironment('secure');

//set POS ID and Second MD5 Key (from merchant admin panel)
OpenPayU_Configuration::setMerchantPosId('397825');
OpenPayU_Configuration::setSignatureKey('25afe39201ea23a189ce06c0b1f3171f');

//set Oauth Client Id and Oauth Client Secret (from merchant admin panel)
OpenPayU_Configuration::setOauthClientId('397825');
OpenPayU_Configuration::setOauthClientSecret('a1667db48578e8d5017cf719a60edc80');