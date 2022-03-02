/*
 * http://suyati.github.io/line-control
 * LineControl 1.1.0
 * Copyright (C) 2014, Suyati Technologies
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this library; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */
(function( $ ) {
	var methods = {
		saveSelection: function() {
			//Function to save the text selection range from the editor
			$(this).data('editor').focus();
		    if (window.getSelection) {
		        sel = window.getSelection();
		        if (sel.getRangeAt && sel.rangeCount)
		            $(this).data('currentRange', sel.getRangeAt(0));
		    } 
		    else {
		        if (document.selection && document.selection.createRange)
		            $(this).data('currentRange',document.selection.createRange());
		        else
		    	    $(this).data('currentRange', null);
		    }
		},
		restoreSelection: function(text,mode) {
			//Function to restore the text selection range from the editor
			var node;
			typeof text !== 'undefined' ? text : false;
			typeof mode !== 'undefined' ? mode : "";
			var range = $(this).data('currentRange');
		    if (range) {
		        if (window.getSelection) {
		        	if (text) {
		            	range.deleteContents();
		            	if (mode == "html") {
    			            var el = document.createElement("div");
				            el.innerHTML = text;
				            var frag = document.createDocumentFragment(), node, lastNode;
				            while (node = el.firstChild) {
				                lastNode = frag.appendChild(node);
				            }
				            range.insertNode(frag);
	            		}
		            	else {
            				range.insertNode(document.createTextNode(text));
		            	}
		            }
		            sel = window.getSelection();
		            sel.removeAllRanges();
		            sel.addRange(range);		            
		        }
		        else if (document.selection && range.select) {
		            range.select();
		            if (text) {
		            	if (mode == "html")
		            		range.pasteHTML(text);
		            	else
		            		range.text = text;
		            }
		        }
		    }
		},
		restoreIESelection:function() {
			//Function to restore the text selection range from the editor in IE
			var range = $(this).data('currentRange');
		    if (range) {
		        if (window.getSelection) {
		            sel = window.getSelection();
		            sel.removeAllRanges();
		            sel.addRange(range);
		        } 
		        else if (document.selection && range.select) {
		            range.select();
		        }
		    }
		},
		init: function(options)
		{
			if ($(this).attr("id") === undefined || $(this).attr("id") === "") {
				$(this).attr("id", Date.now());
			}
			//Número máximo de palabras y gráficos permitidos
			var maxWords = 500, maxGraps = 5;
			
			var menuItems = { 
							'screeneffects':true,
							'togglescreen':{ "text": "Ampliar/reducir visualizador",
											 "icon": "fa fa-arrows-alt",
											 "tooltip": "Ampliar/reducir visualizador",
											 "commandname":null,
											 "custom":function(button, parameters){
												$(this).data("editor").parent().toggleClass('fullscreen');
												var statusdBarHeight=0;
												if($(this).data("statusBar").length)
												{
													statusdBarHeight = $(this).data("statusBar").height();
												}
												if($(this).data("editor").parent().hasClass('fullscreen'))
													$(this).data("editor").css({"height":$(this).data("editor").parent().height()-($(this).data("menuBar").height()+statusdBarHeight)-13});
						                        else
													$(this).data("editor").css({"height":""});
						                    }},
							
							'params': {"obj": null},
						};

			var menuGroups = {'screeneffects': ['togglescreen'] };

			var settings = $.extend({'togglescreen':true},options);

	       	var containerDiv = $("<div/>",{ class : "row-fluid Editor-container" });
			var $this = $(this).hide();	       	
	       	$this.after(containerDiv); 
	       	var menuBar = $( "<div/>",{ id : "menuBarDiv_" + $(this).attr("id"),
								  		class : "row-fluid line-control-menu-bar"
							}).prependTo(containerDiv);
	       	var editor  = $( "<div/>",{	id: "editorDiv_" + $(this).attr("id"),
			   							class : "Editor-editor",
										css : {overflow: "auto"},
										contenteditable:"false"
						 	}).appendTo(containerDiv);
			var statusBar = $("<div/>", {	id : "statusbar_" + $(this).attr("id"),
											class: "row-fluid line-control-status-bar",
											unselectable:"on",
							}).appendTo(containerDiv);
	       	$(this).data("menuBar", menuBar);
	       	$(this).data("editor", editor);
			$(this).data("statusBar", statusBar);
			$(this).data("maxWords", maxWords);
			$(this).data("maxGraps", maxGraps);
			var editor_Content = this;
			
			function showStatusBar() {
				var maxwrd = $(editor_Content).data("maxWords");
				var maxgrp = $(editor_Content).data("maxGraps");
				var cntwrd = methods.getWordCount.apply(editor_Content);
				var cntgrp = methods.getGrapCount.apply(editor_Content);
				$(editor_Content).data("statusBar").html('<div class="label" style="background:' + (cntgrp > maxgrp ? 'red' : '#bd9e56') + '">Gráficos: ' + cntgrp + '/' + maxgrp + '</div>');
				$(editor_Content).data("statusBar").append('<div class="label" style="background:' + (cntwrd > maxwrd ? 'red' : '#bd9e56') + '">Palabras: ' + cntwrd + '/' + maxwrd + '</div>');
				reviewButtons($(editor_Content).data("name"));
			}
			   
	       	for(var item in menuItems){
	       		if(!settings[item] ){ //if the display is not set to true for the button in the settings.	       		
	       			if(settings[item] in menuGroups){
	       				for(var each in menuGroups[item]){
	       					settings[each] = false;
	       				}
	       			}
	       			continue;
	       		}
	       		if(item in menuGroups){
	       			var group = $("<div/>",{class:"btn-group"});	       			
	       			for(var index=0;index<menuGroups[item].length;index++){
	       				var value = menuGroups[item][index];	       				
	       				if(settings[value]){
       						var menuItem = methods.createMenuItem.apply(this,[menuItems[value], settings[value], true]);
       						group.append(menuItem);
       					}
       					settings[value] = false;
	       			}
	       			menuBar.append(group);	       				       			
	       		}
	       		else{
	       			var menuItem = methods.createMenuItem.apply(this,[menuItems[item], settings[item],true]);
	       			menuBar.append(menuItem);
	       		}	       		
	       	}

	       	//For contextmenu
		    editor.bind("contextmenu", function(e){
	       		if($('#context-menu').length)
	       			$('#context-menu').remove();
	       		var cMenu 	= $('<div/>',{id:"context-menu"
	       						}).css({position:"absolute", top:e.pageY, left: e.pageX, "z-index":9999
	       						}).click(function(event){
								    event.stopPropagation();
								});
	       		var cMenuUl = $('<ul/>',{ class:"dropdown-menu on","role":"menu"});
	       		e.preventDefault();

	       		if($(e.target).is('img')) {		       			
	       			methods.createImageContext.apply(this,[e,cMenuUl]);
	       			cMenuUl.appendTo(cMenu);
	       			cMenu.appendTo('body');
	       		}
	       	});
		},
		createMenuItem: function(itemSettings, options, returnElement){
			//Function to perform multiple actions.supplied arguments: itemsettings-list of buttons and button options, options: options for select input, returnelement: boolean.
			//1.Create Select Options using Bootstrap Dropdown.
			//2.Create modal dialog using bootstrap options
			//3.Create menubar buttons binded with corresponding event actions
			typeof returnElement !== 'undefined' ? returnElement : false;

			if(itemSettings["select"]){
				var menuWrapElement = $("<div/>", {class:"btn-group"});
				var menuElement 	= $("<ul/>", {class:"dropdown-menu"});
				menuWrapElement.append($('<a/>',{
										class:"btn btn-default dropdown-toggle",
										"data-toggle":"dropdown",
										"href":"javascript:void(0)",
										"title":itemSettings["tooltip"]
										}).html(itemSettings["default"]).append($("<span/>",{class:"caret"})).mousedown(function(e){
											e.preventDefault();
										}));
				$.each(options,function(i,v){
					var option = $('<li/>')
		            $("<a/>",{
		              tabindex : "-1",
		              href : "javascript:void(0)"
		            }).html(i).appendTo(option);

		            option.click(function(){
		            	$(this).parent().parent().data("value", v);
		            	$(this).parent().parent().trigger("change")
		            });
		            menuElement.append(option);		            
		        });
				var action = "change";
		    }
		    else if(itemSettings["modal"]){
		    	var menuWrapElement = methods.createModal.apply(this,[itemSettings["modalId"], itemSettings["modalHeader"], itemSettings["modalBody"], itemSettings["onSave"]]);		    			    	
		    	var menuElement = $("<i/>");
		    	if(itemSettings["icon"])
					menuElement.addClass(itemSettings["icon"]);
				else
					menuElement.html(itemSettings["text"]);
				menuWrapElement.append(menuElement);
				menuWrapElement.mousedown(function(obj, methods, beforeLoad){
					return function(e){
						e.preventDefault();
						methods.saveSelection.apply(obj);
						if(beforeLoad){		    	    
							beforeLoad.apply(obj); 					
				    	}
					}
				}(this, methods,itemSettings["beforeLoad"]));
				menuWrapElement.attr('title', itemSettings['tooltip']);
				return menuWrapElement;
		    }
			else{
				var menuWrapElement = $("<a/>",{href:'javascript:void(0)', class:'btn btn-default'});
				var menuElement = $("<i/>");
				if(itemSettings["icon"])
					menuElement.addClass(itemSettings["icon"]);
				else
					menuElement.html(itemSettings["text"]);
				var action = "click";
			}
			if(itemSettings["custom"]){
				menuWrapElement.bind(action, (function(obj, params){
						return function(){
						methods.saveSelection.apply(obj);
						itemSettings["custom"].apply(obj, [$(this), params]);
						}
					})(this, itemSettings['params']));
			}
			else{
				menuWrapElement.data("commandName", itemSettings["commandname"]);
				menuWrapElement.data("editor", $(this).data("editor"));
				menuWrapElement.bind(action, function(){ methods.setTextFormat.apply(this) });
			}
			menuWrapElement.attr('title', itemSettings['tooltip']);
			menuWrapElement.css('cursor', 'pointer');
			menuWrapElement.append(menuElement);
			if(returnElement)
				return menuWrapElement;
			$(this).data("menuBar").append(menuWrapElement);
		},
		setTextFormat: function(){
			//Function to run the text formatting options using execCommand.
			methods.setStyleWithCSS.apply(this);
			document.execCommand($(this).data("commandName"), false, $(this).data("value") || null);
			$(this).data("editor").focus();
			return false;
		},
		getSource: function(button, params){
			//Function to show the html source code to the editor and toggle the text display.
			var flag = 0;
			if(button.data('state')){
				flag = 1;
				button.data('state', null);
			}
			else
				button.data('state', 1);
			$(this).data("source-mode", !flag);
			var editor = $(this).data('editor');
			var content;
			if(flag==0){ //Convert text to HTML			
				content = document.createTextNode(editor.html());
				editor.empty();
				editor.attr('contenteditable', false);
				preElement = $("<pre/>",{
					contenteditable: true
				});
				preElement.append(content);				
				editor.append(preElement);
				button.parent().siblings().hide();
				button.siblings().hide();
			}
			else{
				var html = editor.children().first().text();
				editor.html(html);
				editor.attr('contenteditable', true);
				button.parent().siblings().show();
				button.siblings().show();
			}
		},
		countGraps: function(){
			//Function to count the number of graphs recursively as the text grows in the editor.
			var texto = $(this).data("editor").html();
			var count = (texto.match(/<img src="/g) || []).length;
			return count;
		},
		countWords: function(node){
			//Function to count the number of words recursively as the text grows in the editor.
            var count = 0;
    		var textNodes = node.contents().filter(function(){
				return (this.nodeType == 3);
            });
            for (var i=0; i<textNodes.length; i++){
                text = textNodes[i].textContent.replace(/[áéíóúüñ]/g,'').replace(/[^-\w\s]/gi, ' ');
                count += $.trim(text).split(/\s+/).length;
            }
			node.children().each(function(){
				count += methods.countWords.apply(this, [$(this)]);
			});
			return count;
		},
		countChars: function(node){
			//Function to count the number of characters recursively as the text grows in the editor.
			var count = 0;
    		var textNodes = node.contents().filter(function(){
				return (this.nodeType == 3);
			});
			for (var i=0; i<textNodes.length; i++){
				text = textNodes[i].textContent;
				count += text.length;
			}
			node.children().each(function(){
				count += methods.countChars.apply(this, [$(this)]);
			});
			return count;
		},
		getGrapCount: function(){
			//Function to return the word count of the text in the editor
			return methods.countGraps.apply(this, [$(this).data("editor")]);
		},
		getWordCount: function(){
            if ($(this).data("editor").text().trim() == '') return 0;
			//Function to return the word count of the text in the editor
			return methods.countWords.apply(this, [$(this).data("editor")]);
		},
		getCharCount: function(){
			//Function to return the character count of the text in the editor
			return methods.countChars.apply(this, [$(this).data("editor")]);
		},
		rgbToHex: function(rgb){
			//Function to convert the rgb color codes into hexadecimal code
			rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
			return "#" +
			("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
			("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
			("0" + parseInt(rgb[3],10).toString(16)).slice(-2);
		},
		showMessage: function(target,message){
			//Function to show the error message. Supplied arguments:target-div id, message-message text to be displayed.
			var errorDiv=$('<div/>',{ class:"alert alert-danger"}
				).append($('<button/>',{
									type:"button",
									class:"close",
									"data-dismiss":"alert",
									html:"x"
				})).append($('<span/>').html(message));
			errorDiv.appendTo($('#'+target));
			setTimeout(function() { $('.alert').alert('close'); }, 3000);
		},		
		getText: function(){
			//Function to get the source code.
			if(!$(this).data("source-mode"))
				return $(this).data("editor").html();
			else
				return $(this).data("editor").children().first().text();
		},
		setText: function(text){
			//Function to set the source code
			if(!$(this).data("source-mode"))
				$(this).data("editor").html(text);
			else
				$(this).data("editor").children().first().text(text);
		},
		setStyleWithCSS:function(){
			if(navigator.userAgent.match(/MSIE/i)){	//for IE10
				try {
                	Editor.execCommand("styleWithCSS", 0, false);
            	} catch (e) {
	                try {
	                    Editor.execCommand("useCSS", 0, true);
	                } catch (e) {
	                    try {
	                        Editor.execCommand('styleWithCSS', false, false);
	                    } catch (e) {
	                    }
	                }
            	}
			}
			else{
				document.execCommand("styleWithCSS", null, true);
			}
		},
		setName: function(name){
			$(this).data("name",name);
		},
		getName: function(){
			return $(this).data("name");
		},
		setMaxWords: function(maxWords){
			$(this).data("maxWords",maxWords);
		},
		getMaxWords: function(){
			return $(this).data("maxWords");
		},
		setMaxGraps: function(maxGraps){
			$(this).data("maxGraps",maxGraps);
		},
		getMaxGraps: function(){
			return $(this).data("maxGraps");
		}
	}

	$.fn.Viewer = function(method){
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'El método "' +  method + '" no existe en el visualizador' );
		}    
	}; 
})( jQuery );
