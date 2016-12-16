#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: tobi
 * Date: 16.12.16
 * Time: 10:23
 */

require __DIR__ . "/../vendor/autoload.php";

$opt = getopt("h:",['star']);

if (!isset($opt['h'])) {
    print "Bitte gebe die höhe an mit dem flag -h 6\n";
    exit(2);
}

if (!is_numeric($opt['h'])) {
    print "Höhe muss eine zahl entsprechen.\n";
    exit(2);
}

$treeFactory        = new \application\factory\TreeFactory();
$outputStdoutStream = new \application\output\OutputStdoutStream();
$CLI                = new \infrastruktur\CLI($outputStdoutStream);

$tannenbaum = $treeFactory->makeTannenbaum($opt['h'], isset($opt['star']));
$CLI->echoTree($tannenbaum);
