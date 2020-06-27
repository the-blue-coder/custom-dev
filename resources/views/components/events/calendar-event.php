<div class="event_right">
    <div class="event_img">
        <img src="<?php echo $imageSrc; ?>" alt="<?php echo $title; ?>" />
    </div>

    <div class="part_right">
        <?php
            if (is_object($dateObject)) {
                ?>
                    <h3>
                        <strong>SAVE THE DATE :</strong>
                        <?php
                            echo $dateObject->format('d') . ' ';
                            echo mb_strtoupper($dateObject->format('F')) . ' ';
                            echo $dateObject->format('Y');
                        ?>
                    </h3>
                <?php
            }

            if ($title !== '') {
                ?>
                    <h4><?php echo $title; ?></h4>
                <?php
            }

            if ($description !== '') {
                ?>
                    <p><?php echo trim(mb_substr($description, 0, 400)); ?> (...)</p>
                <?php
            }
        ?>
        
        <div class="inscri">
            <a href="#">S’inscrire</a>
        </div>
    </div>

    <div class="clearfix"></div>
</div>