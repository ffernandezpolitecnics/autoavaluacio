<?php

use App\Utils\Validacio;
use Illuminate\Database\QueryException;

function queryExceptionWithErrorInfo(array $errorInfo): QueryException
{
    $previous = new PDOException('Database error');
    $previous->errorInfo = $errorInfo;

    return new QueryException('mysql', 'insert into records', [], $previous);
}

test('it returns a friendly message for duplicate records', function () {
    $exception = queryExceptionWithErrorInfo(['23000', 1062, 'Duplicate entry']);

    expect(Validacio::missatgeError($exception))->toBe('Registre duplicat');
});

test('it returns a friendly message for related records', function () {
    $exception = queryExceptionWithErrorInfo(['23000', 547, 'Foreign key constraint']);

    expect(Validacio::missatgeError($exception))
        ->toBe('Registre amb elements relacionats');
});

test('it maps connection errors reported as SQL state', function () {
    $exception = queryExceptionWithErrorInfo(['08001', null, 'Connection failed']);

    expect(Validacio::missatgeError($exception))
        ->toBe('No es pot connectar amb el servidor de base de dades');
});

test('it does not expose details for unknown database errors', function () {
    $exception = queryExceptionWithErrorInfo(['HY000', 9999, 'Sensitive database details']);
    $message = Validacio::missatgeError($exception);

    expect($message)->toBe('S\'ha produït un error en desar el registre. Torna-ho a provar.');
    expect($message)->not->toContain('Sensitive database details');
});
