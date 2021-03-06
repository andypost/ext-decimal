--TEST--
Decimal::toString
--FILE--
<?php
use Decimal\Decimal;

$tests = [
    [0,             "0"],
    ["0",           "0"],
    ["+0",          "0"],
    ["-0",         "-0"],
    ["0.0",         "0.0"],
    ["1",           "1"],
    ["1.5",         "1.5"],
    ["0.1",         "0.1"],
    ["+0.1",        "0.1"],
    ["-0.1",       "-0.1"],
    [123,           "123"],
    [-123,         "-123"],

    ["0.00000000123",   "0.00000000123"],
    ["0.0000000123",    "0.0000000123"],
    ["0.000000123",     "0.000000123"],
    ["0.00000123",      "0.00000123"],
    ["0.0000123",       "0.0000123"],
    ["0.000123",        "0.000123"],
    ["0.00123",         "0.00123"],
    ["0.0123",          "0.0123"],
    ["0.123",           "0.123"],
    ["1.23",            "1.23"],
    ["12.3",            "12.3"],
    ["123",             "123"],
    ["1230",            "1230"],
    ["12300",           "12300"],
    ["123000",          "123000"],
    ["1230000",         "1230000"],
    ["12300000",        "12300000"],
    ["123000000",       "123000000"],
    ["1230000000",      "1230000000"],

    // Uppercase E
    ["1.5E20",      "150000000000000000000"],
    ["1.5E+20",     "150000000000000000000"],
    ["1.5E-20",     "0.000000000000000000015"],

    ["+1.5E20",     "150000000000000000000"],
    ["+1.5E+20",    "150000000000000000000"],
    ["+1.5E-20",    "0.000000000000000000015"],

    ["-1.5E20",     "-150000000000000000000"],
    ["-1.5E+20",    "-150000000000000000000"],
    ["-1.5E-20",    "-0.000000000000000000015"],

    // Lowercase e
    ["1.5e20",      "150000000000000000000"],
    ["1.5e+20",     "150000000000000000000"],
    ["1.5e-20",     "0.000000000000000000015"],

    ["+1.5e20",     "150000000000000000000"],
    ["+1.5e+20",    "150000000000000000000"],
    ["+1.5e-20",    "0.000000000000000000015"],

    ["-1.5e20",     "-150000000000000000000"],
    ["-1.5e+20",    "-150000000000000000000"],
    ["-1.5e-20",    "-0.000000000000000000015"],

    // Special numbers
    [ "NAN",        "NAN"],
    [ "INF",        "INF"],
    ["+INF",        "INF"],
    ["-INF",       "-INF"],
    [ "nan",        "NAN"],
    [ "inf",        "INF"],
    ["+inf",        "INF"],
    ["-inf",       "-INF"],
    [ "NaN",        "NAN"],
    [ "Inf",        "INF"],
    ["+Inf",        "INF"],
    ["-Inf",       "-INF"],
];

foreach ($tests as $test) {
    $number = $test[0];
    $expect = $test[1];

    $results = [
        (string) Decimal::valueOf($number),
        Decimal::valueOf($number)->toString(),
        Decimal::valueOf($number)->__toString(),
    ];

    foreach ($results as $result) {
        if ($result !== $expect) {
            print_r(compact("number", "result", "expect"));
            break;
        }
    }
}

?>
--EXPECT--
