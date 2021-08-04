<?php
/*
 *
 * (c) Muhideen Mujeeb Adeoye <mujeeb.muhideen@gmail.com>
 *
 */

return [

    /**
     * Mode 
     * live or test
     *
     */
    'mode' => 'live',


    /**
     * Live API url
     *
     */
    'baseUrl' => 'https://api.sendchamp.com/api/v1',

    /**
     * Test Api Url
     *
     */
    'sandboxUrl' => 'https://sandbox-api.sendchamp.com/api/v1',

    /**
     * Public Key
     *
     */
    'publicKey' => 'sendchamp_live_$2y$10$XzTPRF2IIPBvWzecBSWbZ.K09XFc6djK00mOgm9/HWwl1mMNzBBzy',

    /**
     * Webhook
     *
     */
    'webhook' => getenv('SENDCHAMP_WEBHOOK'),


];

