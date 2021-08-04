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
    'mode' => 'test',


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
    'publicKey' => 'sendchamp_test_$2y$10$.moQA3/sJ8PKfiFbZy4zPu..2wKGmL7fudVhPb6tx2dhNlkNIif7C',

    /**
     * Webhook
     *
     */
    'webhook' => getenv('SENDCHAMP_WEBHOOK'),


];

