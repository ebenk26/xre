<?php
    foreach ($data as $notif)
    {
        $elapsed    = time_elapsed_string($notif["created_at"]);

        $readUnread = ($notif["viewed"] == 0) ? 'style="background-color:#ffe2e2"' : '';
?>
        <li <?= $readUnread; ?>>
            <a href="#" class="notif_list" data-source="<?= $notif["id"]; ?>" onclick="notif_list(this)">
                <span class="time"><?= $elapsed; ?></span>
                <span class="details">
                    <span class="label label-sm label-icon label-success">
                        <i class="fa fa-plus"></i>
                    </span> <?= $notif["subject"]; ?> </span>
            </a>
        </li>
<?php
    }
?>