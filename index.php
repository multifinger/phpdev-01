<?php

include './tree/NodeInterface.php';
include './tree/Node.php';

$tree = (new \Node('Electronics'))
    ->addChild(
        (new \Node('Televisions'))
            ->addChild(new \Node('Tube'))
            ->addChild(new \Node('LCD'))
            ->addChild(new \Node('Plasma'))
        )
    ->addChild(
        (new \Node('Portable electronic'))
            ->addChild((new \Node('MP3 players'))->addChild(new \Node('Flash')))
            ->addChild(new \Node('CD players'))
            ->addChild(new \Node('2 way radios'))
        )    
    ;
?>
<html>
    <body>
        <h1><?php echo "Hello world!"; ?></h1>
        <p>I'm <?php echo $_REQUEST['name'] ?? 'Noname'; ?></p>
        <pre><?php echo $tree; ?></pre>
        <p><a href="/war.php">war.php</a></p>
        <p><a href="/lsb.php">lsb.php</a></p>
    </body>
</html>
