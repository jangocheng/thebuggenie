<?php
    $key = $filter->getFilterKey();
    switch ($key)
    {
        case 'posted':
            $title = __('Posted');
            $description = __('Filter on posted date');
            break;
        case 'last_updated':
            $title = __('Last updated');
            $description = __('Filter on last updated date');
            break;
        case 'time_spent':
            $title = __('Time spent');
            $description = __('Filter on time spent date');
            break;
        default:
            $title = __($filter->getFilterTitle());
            $description = __("Filter on %customfield", array('%customfield' => $filter->getFilterTitle()));
            break;
    }
?>
    <div class="filter interactive_dropdown interactive_filter_<?php echo $key; ?>"
         data-filterkey="<?php echo $key; ?>" data-value="<?php echo $filter->getValue(); ?>"
         data-all-value="<?php echo __('Today'); ?>" data-isdate>
        <input type="hidden" name="fs[<?php echo $key; ?>][][o]" value="<?php echo $filter->getOperator(); ?>"
               class="filter_<?php echo $key; ?>_operator_input">
        <input type="hidden" name="fs[<?php echo $key; ?>][][v]" value="<?php echo (int)$filter->getValue(); ?>"
               data-display-value="<?php echo (date('Ymd', (int)$filter->getValue()) == date('Ymd')) ? __('Today') : date('Y-m-d', (int)$filter->getValue()); ?>"
               class="filter_<?php echo $key; ?>_value_input">
        <label><?php echo $title; ?></label>

        <div class="interactive_menu">
            <h1><?php echo $description; ?></h1>

            <div class="interactive_values_container">
                <ul class="interactive_menu_values">
                    <li data-value="&lt;="
                        class="filtervalue<?php if ($filter->getOperator() == '<=') echo ' selected'; ?>" data-operator
                        data-exclusive data-selection-group="1">
                        <?= fa_image_tag('check-square-o', ['class' => 'checked']) . fa_image_tag('square-o', ['class' => 'unchecked']); ?>
                        <input type="checkbox" value="&lt;=" name="filters_<?php echo $key; ?>_operator_before"
                               data-text="<?php echo __('Before %time', array('%time' => '')); ?>"
                               class="filters_<?php echo $key; ?>_operator_before" <?php if ($filter->getOperator() == '<=') echo 'checked'; ?>>
                        <label
                            for="filters_<?php echo $key; ?>_value_before"><?php echo __('Before %time', array('%time' => '')); ?></label>
                    </li>
                    <li data-value="&gt;="
                        class="filtervalue<?php if ($filter->getOperator() == '>=') echo ' selected'; ?>" data-operator
                        data-exclusive data-selection-group="1">
                        <?= fa_image_tag('check-square-o', ['class' => 'checked']) . fa_image_tag('square-o', ['class' => 'unchecked']); ?>
                        <input type="checkbox" value="&gt;=" name="filters_<?php echo $key; ?>_operator_after"
                               data-text="<?php echo __('After %time', array('%time' => '')); ?>"
                               class="filters_<?php echo $key; ?>_operator_after" <?php if ($filter->getOperator() == '>=') echo 'checked'; ?>>
                        <label
                            for="filters_<?php echo $key; ?>_value_after"><?php echo __('After %time', array('%time' => '')); ?></label>
                    </li>
                    <li class="separator"></li>
                </ul>
            </div>
            <div class="interactive_values_container filter_<?php echo $key; ?>_calendar_container"></div>
        </div>
        <span class="value"><?php if (!$filter->hasValue()) echo __('Any time'); ?></span>

        <div class="filter_remove_button"
             onclick="TBG.Search.removeFilter($(this).up());"><?php echo fa_image_tag('times'); ?></div>
    </div>
<?php
