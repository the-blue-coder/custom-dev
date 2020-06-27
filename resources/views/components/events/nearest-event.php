<?php

if ($title !== '') {
    ?>
        <h3>
            SAVE THE DATE : <?php echo $title; ?>
        </h3>
    <?php
}

if ($description !== '') {
    ?>
        <p>
            <?php echo trim(mb_substr($description, 0, 260)); ?> (...)
        </p>
    <?php
}

if (is_object($dateObject)) {
    ?>
        <p>
            <strong>Date :</strong> 
            <?php
                echo $dateObject->format('d') . ' ';
                echo $dateObject->format('F') . ' ';
                echo $dateObject->format('Y') . ' à ';
                echo $dateObject->format('H') . 'h';
                echo $dateObject->format('i');
            ?>
        </p>
    <?php
}

if ($address !== '') {
    ?>
        <p>
            <strong>Lieu :</strong> 
            <?php echo $address; ?>
        </p>
    <?php
}

if ($speaker !== '') {
    ?>
        <p>
            <strong>Intervenant :</strong> 
            <?php echo $speaker; ?>
        </p>
    <?php
}

if ($availableSeats > 0) {
    ?>
        <p>
            <strong>Places disponible :</strong> 
            <?php echo $availableSeats; ?>
        </p>
    <?php
}

?>

<p>
    <a class="link_event" href="#">S’inscrire</a>
</p>