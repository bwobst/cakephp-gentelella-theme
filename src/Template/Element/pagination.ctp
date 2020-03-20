<div class="text-center">
    <p><?= $this->Paginator->counter([
    'format' => 'Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total'
]) ?></p>

    <span class="pagination">
        <?php echo $this->Paginator->numbers(); ?>
    </span>

</div>
