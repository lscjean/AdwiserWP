<style type="text/css" class="darkmysite_inline_css">
    #darkmysite_switch_<?php echo esc_attr($this->unique_id);?> {
    <?php foreach($this->utils->generateSwitchStyles($this->data_settings) as $key => $value ){ ?>
    <?php echo esc_attr($key); ?>: <?php echo esc_attr($value); ?>;
    <?php } ?>
    }

    #darkmysite_switch_<?php echo esc_attr($this->unique_id);?> {
        --darkmysite_switch_margin_from_top: <?php echo esc_attr($this->data_settings["dark_mode_switch_margin_top"]); ?>px;
        --darkmysite_switch_margin_from_bottom: <?php echo esc_attr($this->data_settings["dark_mode_switch_margin_bottom"]); ?>px;
        --darkmysite_switch_margin_from_left: <?php echo esc_attr($this->data_settings["dark_mode_switch_margin_left"]); ?>px;
        --darkmysite_switch_margin_from_right: <?php echo esc_attr($this->data_settings["dark_mode_switch_margin_right"]); ?>px;
    <?php if($this->data_settings["enable_floating_switch_tooltip"] == "1"){ ?>
        --darkmysite_switch_tooltip_bg_color: <?php echo esc_attr($this->data_settings["floating_switch_tooltip_bg_color"]); ?>;
        --darkmysite_switch_tooltip_text_color: <?php echo esc_attr($this->data_settings["floating_switch_tooltip_text_color"]); ?>;
    <?php } ?>
    }
</style>

<?php
$hide_on_mobile_by_screen = "";
if($this->data_settings["hide_on_mobile"] == "1"){
    if($this->data_settings["hide_on_mobile_by"] == "screen_size" || $this->data_settings["hide_on_mobile_by"] == "both"){
        $hide_on_mobile_by_screen = "darkmysite_hide_on_mobile";
    }
}
?>

<?php
$floating_switch_position = "darkmysite_".$this->data_settings["dark_mode_switch_position"];
?>

<?php
$tooltip_classes = "";
if($this->data_settings["enable_floating_switch_tooltip"] == "1"){
    $tooltip_classes = "darkmysite_tooltip darkmysite_tooltip_".$this->data_settings["floating_switch_tooltip_position"];
}
?>

<?php if($this->data_settings["dark_mode_switch_design"] == "apple") { ?>
    <div id="darkmysite_switch_<?php echo esc_attr($this->unique_id);?>" class="darkmysite_switch <?php echo esc_attr($hide_on_mobile_by_screen);?> <?php echo esc_attr($floating_switch_position);?> <?php echo esc_attr($this->data_settings["enable_absolute_position"] == "1" ? "darkmysite_absolute_position" : ""); ?> <?php echo esc_attr($tooltip_classes); ?> darkmysite_switch_apple" onclick="darkmysite_switch_trigger()">
        <span class="darkmysite_switch_icon"></span>
        <?php if($this->data_settings["enable_floating_switch_tooltip"] == "1"){ ?> <span class="darkmysite_tooltiptext"><?php echo esc_attr($this->data_settings["floating_switch_tooltip_text"]); ?></span> <?php } ?>
    </div>
<?php } ?>
<?php if($this->data_settings["dark_mode_switch_design"] == "banana") { ?>
    <div id="darkmysite_switch_<?php echo esc_attr($this->unique_id);?>" class="darkmysite_switch <?php echo esc_attr($hide_on_mobile_by_screen);?> <?php echo esc_attr($floating_switch_position);?> <?php echo esc_attr($this->data_settings["enable_absolute_position"] == "1" ? "darkmysite_absolute_position" : ""); ?> <?php echo esc_attr($tooltip_classes); ?> darkmysite_switch_banana" onclick="darkmysite_switch_trigger()">
        <span class="darkmysite_switch_icon"></span>
        <?php if($this->data_settings["enable_floating_switch_tooltip"] == "1"){ ?> <span class="darkmysite_tooltiptext"><?php echo esc_attr($this->data_settings["floating_switch_tooltip_text"]); ?></span> <?php } ?>
    </div>
<?php } ?>