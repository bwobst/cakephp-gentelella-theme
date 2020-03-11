<?php
$types = [
    'Flash/success' => [
        'alert-class' => 'alert-success',
        'fa-class' => 'fa-check'
    ],
    'Flash/error' => [
        'alert-class' => 'alert-danger',
        'fa-class' => 'fa-ban'
    ]
];

?>
<section class="content-header">
    <div class="alert <?= $types[$element]['alert-class'] ?> alert-dismissible">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <span><i class="icon fa <?= $types[$element]['fa-class'] ?>"></i><?= h($message) ?></span>
    </div>
</section>
