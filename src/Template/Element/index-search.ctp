<?= $this->Form->create(null, array('role' => 'form', 'class' => 'col-md-4 col-xs-12')) ?>
<div class="input-group input-group-sm">
    <input type="text" name="search" class="form-control"
        placeholder="<?= __d('gentelella', 'Search...') ?>"
        value="<?= empty($search) ? '' : h($search) ?>">
    <span class="input-group-btn">
        <button class="btn btn-info btn-flat" type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>
        <button class="btn btn-flat reset-btn"><span class="fa fa-remove" aria-hidden="true"></span> <?= __d('gentelella', 'Reset') ?></button>
    </span>
</div>
</form>
<script>
$(document).ready(function() {
    $("form .reset-btn").click(function() {
        var $f = $(this).closest("form");
        $f.find("input[type=text]").val("");
        $f.submit();
    });
});
</script>
