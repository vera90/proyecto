/* ===========================================================
* bootstrap-fileupload.js j1a
* http://jasny.github.com/bootstrap/javascript.html#fileupload
* ===========================================================
* Copyright 2012 Jasny BV, Netherlands.
*
* Licensed under the Apache License, Version 2.0 (the "License")
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
* ========================================================== */!function(e){"use strict";var t=function(t,n){this.$element=e(t);this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file");this.$input=this.$element.find(":file");if(this.$input.length===0)return;this.name=this.$input.attr("name")||n.name;this.$hidden=this.$element.find(':hidden[name="'+this.name+'"]');if(this.$hidden.length===0){this.$hidden=e('<input type="hidden" />');this.$element.prepend(this.$hidden)}this.$preview=this.$element.find(".fileupload-preview");var r=this.$preview.css("height");this.$preview.css("display")!="inline"&&r!="0px"&&r!="none"&&this.$preview.css("line-height",r);this.$remove=this.$element.find('[data-dismiss="fileupload"]');this.listen()};t.prototype={listen:function(){this.$input.on("change.fileupload",e.proxy(this.change,this));this.$remove&&this.$remove.on("click.fileupload",e.proxy(this.clear,this))},change:function(e,t){var n=e.target.files!==undefined?e.target.files[0]:{name:e.target.value.replace(/^.+\\/,"")};if(!n||t==="clear")return;this.$hidden.val("");this.$hidden.attr("name","");this.$input.attr("name",this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof n.type!="undefined"?n.type.match("image.*"):n.name.match("\\.(gif|png|jpe?g)$"))&&typeof FileReader!="undefined"){var r=new FileReader,i=this.$preview,s=this.$element;r.onload=function(e){i.html('<img src="'+e.target.result+'" '+(i.css("max-height")!="none"?'style="max-height: '+i.css("max-height")+';"':"")+" />");s.addClass("fileupload-exists").removeClass("fileupload-new")};r.readAsDataURL(n)}else{this.$preview.text(n.name);this.$element.addClass("fileupload-exists").removeClass("fileupload-new")}},clear:function(e){this.$hidden.val("");this.$hidden.attr("name",this.name);this.$input.attr("name","");this.$preview.html("");this.$element.addClass("fileupload-new").removeClass("fileupload-exists");this.$input.trigger("change",["clear"]);e.preventDefault();return!1}};e.fn.fileupload=function(n){return this.each(function(){var r=e(this),i=r.data("fileupload");i||r.data("fileupload",i=new t(this,n))})};e.fn.fileupload.Constructor=t;e(function(){e("body").on("click.fileupload.data-api",'[data-provides="fileupload"]',function(t){var n=e(this);if(n.data("fileupload"))return;n.fileupload(n.data());e(t.target).data("dismiss")=="fileupload"&&e(t.target).trigger("click.fileupload")})})}(window.jQuery);!function(e){"use strict";var t=function(t,n){n=e.extend({},e.fn.rowlink.defaults,n);var r=t.nodeName=="tr"?e(t):e(t).find("tr:has(td)");r.each(function(){var t=e(this).find(n.target).first();if(!t.length)return;var r=t.attr("href");e(this).find("td").not(".nolink").click(function(){window.location=r});e(this).addClass("rowlink");t.replaceWith(t.html())})};e.fn.rowlink=function(n){return this.each(function(){var r=e(this),i=r.data("rowlink");i||r.data("rowlink",i=new t(this,n))})};e.fn.rowlink.defaults={target:"a"};e.fn.rowlink.Constructor=t;e(function(){e('[data-provides="rowlink"]').each(function(){e(this).rowlink(e(this).data())})})}(window.jQuery);