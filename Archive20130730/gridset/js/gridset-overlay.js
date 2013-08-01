// Gridset Overlay JS

gs = {

	init: function () {
		
		if (window.location.href.match('gridset=show')) gs.show();
	
		gs.bind(document, 'keydown', function (e) { 
		
			if (!e) var e = window.event;
		
			if(e.metaKey || e.ctrlKey) {
				
				switch (e.which || e.keyCode) {
					case 71:
					
						var gw = document.querySelectorAll('.gridsetoverlaywrap, #gridsetoverlaystyles, #gridscreenwidthwrap');
					
						if (gw.length == 0) gs.show();
						else { window.location.href = window.location.href.replace('?gridset=show', '') }
						
						gs.prevent(e);
						break;
						
				}
				
			}
		
		
		});
	
	},
	
	width: function () {
		
		var swv = document.getElementById('gridscreenwidthval');
		if (swv) swv.innerHTML = window.innerWidth + 'px';
		
	},

	show: function () {
	
		var b = document.getElementsByTagName('body')[0],
				gridareas = document.querySelectorAll('[class*=-showgrid]'),
				areacount = gridareas.length,
				wrapper = document.querySelectorAll('.wrapper'),
			
				styles = '.gridsetoverlaywrap{display:block;position:absolute;top:0;left:0;width:100%;height:100%;z-index:10000;pointer-events:none;}.gridsetnoareas .gridsetoverlaywrap{position:fixed;}.gridwrap{display:block;position:absolute;top:0;left:0;width:100%;height:100%;font-family:Helvetica, Arial, sans-serif !important;}.gridoverlay{position:relative;height:100%;overflow:hidden !important;background:none !important;}.gridoverlay .gridset{position:absolute;width:100%;height:100%;top:0;left:0;opacity:0.8; display:block;}.gridoverlay .gridset div{text-align:left;font-size:10px !important;border:1px solid #FFD800 !important;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box;height:100%;}.gridoverlay .gridset > div{border:none !important;height:100%;position:absolute;top:0;left:0;width:100%;}.gridoverlay div small{width:100%;display:block;text-align:center;font-weight:400 !important;letter-spacing: 1px !important;padding-top:0 !important;text-transform:none !important;height:22px !important;line-height:22px !important;text-style:normal !important;border-bottom:1px solid #FFD800 !important;color:#333 !important;background-color:#FFF79F !important;}.gridsetnoareas .gridoverlay .gridset > div:nth-child(2){border-style:dashed;padding-top:23px;}.gridsetnoareas .gridoverlay .gridset > div:nth-child(2) small{border-style:dashed;}.gridsetnoareas .gridoverlay .gridset > div:nth-child(3){border-style:dotted;padding-top:45px;}.gridsetnoareas .gridoverlay .gridset > div:nth-child(3) small{border-style:dotted;}.gridsetoverlaywrap .noshow{display:none;}#gridscreenwidthwrap{display:none;width:100%;position:fixed !important;z-index:10000 !important;bottom:0 !important;left:0 !important;height:30px !important;opacity:0.95;border-top:1px solid #FFD800 !important;color:#333;background-color:#FFF79F !important;font-family:Helvetica, Arial, sans-serif !important;}.gridsetnoareas #gridscreenwidthwrap{position:fixed;}#gridscreenwidth{display:block;width:100%;text-align:center;font-size:12px;line-height:1;padding-top:8px;}#gridscreenwidth strong{text-transform:none;}',
				
				newstyles = document.createElement('style'),
				newwidth = document.createElement('div'),
				head = document.getElementsByTagName('head'),
				newfavicon = document.createElement('link'),
				scripts = document.getElementsByTagName('script'),
				newgsstyles = document.createElement('link');
		
		newstyles.id = 'gridsetoverlaystyles';
		newstyles.innerHTML = styles;
		newstyles.type = 'text/css';
		
		newwidth.id = 'gridscreenwidthwrap';
		newwidth.innerHTML = '<p id="gridscreenwidth">Screen width: <strong id="gridscreenwidthval"></strong></p>';
		
		b.appendChild(newstyles);
		b.appendChild(newwidth);
		
		var newwidthdisplay = (newwidth.currentStyle) ? newwidth.currentStyle.display : getComputedStyle(newwidth, null).display;
		
		newfavicon.rel = "shortcut icon";
		newfavicon.id = "gridsetfavicon";
		newfavicon.href = "http://dev.gridsetapp.com/app/img/favicon.ico";
		
		head[0].appendChild(newfavicon);
		
		if (newwidthdisplay != 'block') {
		
			newgsstyles.rel = "stylesheet";
			newgsstyles.id = "gridsetstyles";
			newgsstyles.href = scripts[scripts.length-1].src.replace('overlay/', '');
			head[0].appendChild(newgsstyles);
		
		}
		
		if (areacount) {
			
			var j = areacount;
			
			while (j-- > 0) {
			
				var area = gridareas[j];
			
				gs.buildgrid(area, j, areacount);
				
				if (window.getComputedStyle(area,null).getPropertyValue("position") == 'static') area.style.position = 'relative';
				
			}
			
		}
		else {
			
			if (!b.className.match('gridsetnoareas')) b.className += ' gridsetnoareas';
			
			gs.buildgrid(b, j, areacount);
		
		}
		
		gs.width();
		gs.bind(window, 'resize', gs.width);
	
	},
	
	buildgrid: function (area, j, showgrid) {
		
		var set = JSON.parse('{"id":"21278","name":"ifnotwhynot","widths":{"990":{"width":990,"grids":{"a":{"name":"Alpha","prefix":"a","width":990,"columns":{"a1":{"name":"a1","unit":"%","percent":7.40319865,"px":73.29},"a2":{"name":"a2","unit":"%","percent":7.40319865,"px":73.29},"a3":{"name":"a3","unit":"%","percent":7.40319865,"px":73.29},"a4":{"name":"a4","unit":"%","percent":7.40319865,"px":73.29},"a5":{"name":"a5","unit":"%","percent":7.40319865,"px":73.29},"a6":{"name":"a6","unit":"%","percent":7.40319865,"px":73.29},"a7":{"name":"a7","unit":"%","percent":7.40319865,"px":73.29},"a8":{"name":"a8","unit":"%","percent":7.40319865,"px":73.29},"a9":{"name":"a9","unit":"%","percent":7.40319865,"px":73.29},"a10":{"name":"a10","unit":"%","percent":7.40319865,"px":73.29},"a11":{"name":"a11","unit":"%","percent":7.40319865,"px":73.29},"a12":{"name":"a12","unit":"%","percent":7.40319865,"px":73.29}},"gutter":{"unit":"px","px":10,"percent":1.01010101},"ratio":{"name":"even","value":1}}}}},"prefixes":{"index":["a"],"990":["a"]}}'),
		
				gridwrap = document.createElement('div'),
				gridinner = (showgrid) ? '<div class="gridwrap"><div class="gridoverlay">' : '<div class="gridwrap"><div class="gridoverlay wrapper">';
		
		if (showgrid) gridwrap.className = 'gridsetoverlaywrap';
		else gridwrap.className = 'gridsetoverlaywrap';	
		
		for (w in set.widths) {
			
			var width = set.widths[w],
					hides = '';
			
			for (p in set.prefixes) {
				
				if (p != w && p != 'index') hides += set.prefixes[p][0] + "-hide ";
				
			}
			
			gridinner += '<div class="gridset ' + hides + '">';
			
			for (j in width.grids) {
			
				var grid = width.grids[j];
				
				if (!showgrid || area.className.match(grid.prefix + '-showgrid')) {
				
					gridinner += '<div>';
					
					for (k in grid.columns) {
						
						var col = grid.columns[k];
						
						gridinner += '<div class="' + col.name + '"><small>' + col.name + '</small></div>';
					
					}
					
					gridinner += '</div>';
				
				}
			}
			
			gridinner += '</div>';
		
		}
		
		gridinner += '</div></div>';
		
		gridwrap.innerHTML = gridinner;
		
		area.appendChild(gridwrap);
		
	},
	
	bind : function (t, e, f) {
		
		if (t.attachEvent) t.attachEvent('on' + e, f);
		else t.addEventListener(e, f, false);
	
	},
	
	prevent : function (e) {
	
		if (e.preventDefault) e.preventDefault();
		else event.returnValue = false;
	
	}


};

gs.init();