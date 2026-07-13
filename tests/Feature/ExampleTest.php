<?php

test('returns a successful response', function () {
    $response = $this->get(route('equipment.index'));

    $response->assertOk();
});