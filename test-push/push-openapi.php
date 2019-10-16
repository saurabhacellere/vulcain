#!/usr/bin/env php
<?php

/**
 * The Push Limit must be configured to 2 before running this test.
 * See server_test.go::TestH2PushLimit
 */

require __DIR__ . '/tester.php';

assertRequests([
    ['/oa/books.json', ['headers' => ['Preload' => '/member/*']]],
], [
    'Queueing pushed response: "' . GATEWAY_URL . '/oa/books/1"',
    'Queueing pushed response: "' . GATEWAY_URL . '/oa/books/2"',
    'Request: "GET ' . GATEWAY_URL . '/oa/books.json"',
    'Response: "200 ' . GATEWAY_URL . '/oa/books.json"',
]);
