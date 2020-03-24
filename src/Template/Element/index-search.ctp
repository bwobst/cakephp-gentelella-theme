<?php
/**
 * @param $before   Optional HTML to insert before the search button
 */
?>
<?= $this->Form->create(null, array('role' => 'form', 'class' => 'form-inline search-form', 'style' => 'padding-bottom:1em')) ?>
<div class="form-group form-group-sm">
    <input type="text" name="search" class="form-control"
        placeholder="<?= __d('gentelella', 'Search...') ?>"
        value="<?= empty($search) ? '' : h($search) ?>">
</div>
<?= empty($before) ? '' : $before ?>
<div class="form-group form-group-sm">
    <button class="btn btn-info btn-flat btn-sm" type="submit" style="margin-bottom:0"><span class="fa fa-search"
            aria-hidden="true"></span> <?= __d('gentelella', 'Search') ?></button>
    <button class="btn btn-flat reset-btn btn-sm" style="margin-bottom:0"><span class="fa fa-remove"
            aria-hidden="true"></span> <?= __d('gentelella', 'Reset') ?></button>
</div>
<input type="hidden" name="_reset" value=""/>
<?= $this->Form->end() ?>
<script>
    $(document).ready(function() {
        $(".search-form .reset-btn").click(function() {
            var $f = $(this).closest("form");
            $f.find('input[name=_reset]').val(1);
        });

        // Strip any "page" query parameter per https://stackoverflow.com/a/1634841
        var action = $(".search-form").attr('action');
        $(".search-form").attr('action', removeURLParameter(action, 'page'));

        function removeURLParameter(url, parameter) {
            //prefer to use l.search if you have a location/link object
            var urlparts = url.split('?');
            if (urlparts.length >= 2) {

                var prefix = encodeURIComponent(parameter) + '=';
                var pars = urlparts[1].split(/[&;]/g);

                //reverse iteration as may be destructive
                for (var i = pars.length; i-- > 0;) {
                    //idiom for string.startsWith
                    if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                        pars.splice(i, 1);
                    }
                }

                return urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : '');
            }
            return url;
        }
    });
</script>
