<?php


//set Sandbox Environment
OpenPayU_Configuration::setEnvironment('secure');

//set POS ID and Second MD5 Key (from merchant admin panel)
OpenPayU_Configuration::setMerchantPosId('1429437');
OpenPayU_Configuration::setSignatureKey('d0456981b40852bd84f338db26b347cd');

//set Oauth Client Id and Oauth Client Secret (from merchant admin panel)
OpenPayU_Configuration::setOauthClientId('1429437');
OpenPayU_Configuration::setOauthClientSecret('b5f526e52a60557b11f96b635a65dea4');