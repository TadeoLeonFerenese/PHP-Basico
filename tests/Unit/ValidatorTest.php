<?php

use Core\Validator;

// Test para validar emails correctos
test('validates correct email addresses', function () {
    expect(Validator::email('test@example.com'))->toBeTrue();
    expect(Validator::email('user.name@domain.co.uk'))->toBeTrue();
});

// Test para rechazar emails incorrectos
test('rejects invalid email addresses', function () {
    expect(Validator::email('invalid-email'))->toBeFalse();
    expect(Validator::email('test@'))->toBeFalse();
    expect(Validator::email('@example.com'))->toBeFalse();
});

// Test para validar números mayores que un valor dado
test('validates numbers greater than specified value', function () {
    expect(Validator::greaterThan('10', 5))->toBeTrue();
    expect(Validator::greaterThan('100', 50))->toBeTrue();
});

// Test para rechazar números menores o iguales
test('rejects numbers not greater than specified value', function () {
    expect(Validator::greaterThan('5', 10))->toBeFalse();
    expect(Validator::greaterThan('10', 10))->toBeFalse();
});