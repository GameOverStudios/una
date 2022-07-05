SET @sName = 'bx_protean';


-- SETTINGS
SET @iSystemCategoryId = (SELECT `id` FROM `sys_options_categories` WHERE `name`='system' LIMIT 1);
SET @iSystemCategoryOrder = (SELECT IFNULL(MAX(`order`), 0) FROM `sys_options` WHERE `category_id`=@iSystemCategoryId LIMIT 1);

DELETE FROM `sys_options` WHERE `name`='bx_protean_site_logo_aspect_ratio';
INSERT INTO `sys_options`(`category_id`, `name`, `caption`, `value`, `type`, `extra`, `check`, `check_error`, `order`) VALUES
(@iSystemCategoryId, 'bx_protean_site_logo_aspect_ratio', '', '', 'digit', '', '', '', @iSystemCategoryOrder + 1);

DELETE FROM `sys_options` WHERE `name` IN ('bx_protean_site_logo_width', 'bx_protean_site_logo_height');
DELETE FROM `sys_options_mixes2options` WHERE `option` IN ('bx_protean_site_logo_width', 'bx_protean_site_logo_height');

UPDATE `sys_options` SET `value`='1280' WHERE `name`=CONCAT(@sName, '_page_width');

SET @iMixId = (SELECT `id` FROM `sys_options_mixes` WHERE `name`='Neat-Mix' LIMIT 1);
UPDATE `sys_options_mixes2options` SET `value`='1280px' WHERE `option`='bx_lucid_page_width' AND `mix_id`=@iMixId;

SET @iMixId = (SELECT `id` FROM `sys_options_mixes` WHERE `name`='Protean-Light-Mix' LIMIT 1);
UPDATE `sys_options_mixes2options` SET `value`='1280px' WHERE `option`='bx_lucid_page_width' AND `mix_id`=@iMixId;

SET @iMixId = (SELECT `id` FROM `sys_options_mixes` WHERE `name`='Protean-Dark-Mix' LIMIT 1);
UPDATE `sys_options_mixes2options` SET `value`='1280px' WHERE `option`='bx_lucid_page_width' AND `mix_id`=@iMixId;

UPDATE `sys_options_mixes` SET `dark`='1' WHERE `name`='Protean-Dark-Mix';
