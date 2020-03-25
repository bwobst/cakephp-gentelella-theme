<?php
/**
 * @param string $element
 * @param string $message
 * @param array $params     Has key for 'escape' for whether to escape the HTML, default true
 */
$types = [
    'Flash/success' => [
        'alert-class' => 'alert-success',
        'fa-class' => 'fa-check'
    ],
    'Flash/error' => [
        'alert-class' => 'alert-danger',
        'fa-class' => 'fa-ban'
    ],
    'Flash/info' => [
        'alert-class' => 'alert-info',
        'fa-class' => 'fa-exclamation'
    ],
    'Flash/default' => [
        'alert-class' => '',
        'fa-class' => ''
    ]
];
if (empty($types[$element]))
{
    $element = 'Flash/default';
}
$escape = isset($params['escape']) ? $params['escape'] : true;
?>
<section class="content-header">
    <div class="alert <?= $types[$element]['alert-class'] ?> alert-dismissible">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <span><i class="icon fa <?= $types[$element]['fa-class'] ?>"></i><?= $escape ? h($message) : $message ?></span>
    </div>
</section>
