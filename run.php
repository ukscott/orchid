<?php

require __DIR__ . '/vendor/autoload.php';

use GetOptionKit\OptionCollection;
use GetOptionKit\OptionParser;
use GetOptionKit\OptionPrinter\ConsoleOptionPrinter;

function options($specs)
{
    echo PHP_EOL . "Enabled options: \n";
    $printer = new ConsoleOptionPrinter();
    echo $printer->render($specs);
}

$specs = new OptionCollection;

$specs->add('a|all', 'All users as json list.');

$specs->add('u|user:', 'Get user by id. Output as JSON.')
    ->isa('Number');

$parser = new OptionParser($specs);

$users = new \App\Users();

try {
    $result = $parser->parse($argv);

    if (isset($result->keys['all'])) {
        // List all users
        echo json_encode($users->all(), JSON_PRETTY_PRINT);
    } elseif (isset($result->keys['user'])) {
        // Get user by ID -- TODO
        $user = $users->get($result->keys['user']->value);
        echo json_encode($user, JSON_PRETTY_PRINT);
    } else {
        options($specs);
    }

} catch (Exception $e) {
    echo $e->getMessage();
    options($specs);
}
