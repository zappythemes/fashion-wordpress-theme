(function() {

	tinymce.create('tinymce.plugins.Addshortcodes', {
		init : function(ed, url) {
		
/* Add Box
============================================================================================================ */
			ed.addButton('AddBox', {
				title : 'Box',
				cmd : 'tinyBoxes',
				image : url + '../../images/boxes.png'
			});
			ed.addCommand('tinyBoxes', function() {
				ed.windowManager.open({file : url + '../../zappy_win.php?action=box',width : 600 ,	height : 450 ,	inline : 1});
			});	
			
/* Add Quote
============================================================================================================ */
			ed.addButton('Quotes', {
				title : 'Quote',
				cmd : 'tinyQuotes',
				image : url + '../../images/quote.png'
			});
			ed.addCommand('tinyQuotes', function() {
				ed.windowManager.open({file : url + '../../zappy_win.php?action=quote',width : 400 ,	height : 300 ,	inline : 1});
			});	
			
/* Add Buttons
============================================================================================================ */
			
			ed.addButton('AddButtons', {
				title : 'Button',
				cmd : 'tinyButtons',
				image : url + '../../images/buttons.png'
			});
			ed.addCommand('tinyButtons', function() {
				ed.windowManager.open({file : url + '../../zappy_win.php?action=buttons',width : 600 ,	height : 250 ,	inline : 1});
			});
			
			
/* Add icons
============================================================================================================ */
		
			ed.addButton('Icons', {
				title : 'Add Icon',
				cmd : 'tinyIcons',
				image : url + '../../images/icon.png'
			});
			ed.addCommand('tinyIcons', function() {
				ed.windowManager.open({file : url + '../../zappy_win.php?action=icon',width : 600 ,	height : 250 ,	inline : 1});
			});
			
		
/* Add Twitter
============================================================================================================ */

			ed.addButton('AddTwitter', {
				title : 'Add Your Latest Tweets',
				cmd : 'tinyTwitter',
				image : url + '../../images/twitter.png'
			});
			ed.addCommand('tinyTwitter', function() {
				ed.windowManager.open({file : url + '../../zappy_win.php?action=twitter',width : 600 ,	height : 250 ,	inline : 1});
			});
			
/* Add Video
============================================================================================================ */

			ed.addButton('Video', {
				title : 'Add Video',
				cmd : 'tinyVideo',
				image : url + '../../images/video.png'
			});
			ed.addCommand('tinyVideo', function() {
				ed.windowManager.open({file : url + '../../zappy_win.php?action=video',width : 600 ,	height : 300 ,	inline : 1});
			});
			
/* Add Tooltip
============================================================================================================ */
		
			ed.addButton('Tooltip', {
				title : 'Add Tooltip',
				cmd : 'tinyTooltip',
				image : url + '../../images/tooltip.png'
			});
			ed.addCommand('tinyTooltip', function() {
				ed.windowManager.open({file : url + '../../zappy_win.php?action=tooltip',width : 600 ,	height : 440 ,	inline : 1});
			});


/* Add AuthorBio
============================================================================================================ */
			
			ed.addButton('AuthorBio', {
				title : 'Add Author Bio',
				cmd : 'tinyAuthorBio',
				image : url + '../../images/author.png'
			});
			ed.addCommand('tinyAuthorBio', function() {
				ed.windowManager.open({file : url + '../../zappy_win.php?action=author',width :400,	height : 300 ,	inline : 1});
			});
			
/* Add Toggle
============================================================================================================ */
				ed.addButton('Toggle', {
				title : 'Add Toggle Block',
				cmd : 'tinyToggle',
				image : url + '../../images/toggle.png'
			});
			ed.addCommand('tinyToggle', function() {
				ed.windowManager.open({file : url + '../../zappy_win.php?action=toggle',width : 600 ,	height : 375 ,	inline : 1});
			});

/* Add Tabs
============================================================================================================ */
			
			ed.addButton('Tabs', {
				title : 'Add Tabbed Block',
				cmd : 'tinytabs',
				image : url + '../../images/tabs.png'
			});
			ed.addCommand('tinytabs', function() {
				ed.windowManager.open({file : url + '../../zappy_win.php?action=tabs',width : 600 ,	height : 375 ,	inline : 1});
			});

				
/* 	ShareButtons
============================================================================================================ */
		
			ed.addButton('ShareButtons', {
				title : 'Add Share Buttons',
				cmd : 'tinyShareButtons',
				image : url + '../../images/share.png'
			});
			ed.addCommand('tinyShareButtons', function() {
				ed.windowManager.open({file : url + '../../zappy_win.php?action=share',width : 200 ,	height : 300 ,	inline : 1});
			});
  			
		},
		getInfo : function() {
			return {
				longname : "zappyShortcodes",
				author : 'zappy',
				authorurl : 'http://www.zappythemes.com/',
				infourl : 'http://www.zappythemes.com/',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('zappyShortCodes', tinymce.plugins.Addshortcodes);	
	
})();