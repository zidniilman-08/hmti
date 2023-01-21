/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.filebrowserBrowseUrl      = '/assets/editor/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '/assets/editor/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '/assets/editor/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl      = '/assets/editor/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/assets/editor/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '/assets/editor/kcfinder/upload.php?opener=ckeditor&type=flash';
    
    config.extraPlugins = 'youtube';
    config.youtube_responsive = true;
    config.youtube_related = true;
    config.youtube_privacy = false;
    config.youtube_controls = true;
};
