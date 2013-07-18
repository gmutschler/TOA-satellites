// http://docs.cksource.com/FCKeditor_2.x/Developers_Guide/Configuration/Configuration_Options
// http://docs.cksource.com/FCKeditor_2.x/Developers_Guide/Configuration/Toolbar

// Base conf
FCKConfig.SkinPath = FCKConfig.BasePath + 'skins/famfamfamAluminum/';
FCKConfig.ToolbarCanCollapse = false;
FCKConfig.StartupFocus = true;
FCKConfig.ForcePasteAsPlainText = true;

// Toolbars and menus
FCKConfig.ToolbarSets['TOA'] = [

	['Save'],
	['FitWindow','-','ShowBlocks','Source'],
	['Cut','Copy','Paste','PasteText','PasteWord'],
	['Undo','Redo','-','Find','-','SelectAll','RemoveFormat'],
	'/',
	['FontFormat','-','Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
	['TextColor','BGColor'],
	'/',
	['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote'],
	['Link','Unlink','Anchor'],
	['Rule','SpecialChar']
];
FCKConfig.FontFormats = 'p;h1;h2';
FCKConfig.ContextMenu = ['Generic','Link','Anchor','Table'];

// Links
FCKConfig.DefaultLinkTarget = '_self';
FCKConfig.LinkUpload = false;
FCKConfig.LinkBrowser = false;
FCKConfig.LinkDlgHideTarget = true;
FCKConfig.LinkDlgHideAdvanced  = true;


// Not really used, but safer when it's all off
FCKConfig.ImageUpload = false;
FCKConfig.ImageBrowser = false;
FCKConfig.ImageDlgHideLink = true;
FCKConfig.ImageDlgHideAdvanced  = true;

FCKConfig.FlashUpload = false;
FCKConfig.FlashBrowser = false;
FCKConfig.FlashDlgHideAdvanced  = true;
