$(document).ready(function(){
	if($.ui){
	$.widget( "ui.dialog", $.ui.dialog, {
		 /**
		  * jQuery UI v1.11+ fix to accommodate CKEditor (and other iframed content) inside a dialog
		  * @see http://bugs.jqueryui.com/ticket/9087
		  * @see http://dev.ckeditor.com/ticket/10269
		  */
		  _allowInteraction: function( event ) {
		    return this._super( event ) ||

		      // addresses general interaction issues with iframes inside a dialog
		      event.target.ownerDocument !== this.document[ 0 ] ||

		      // addresses interaction issues with CKEditor's dialog windows and iframe-based dropdowns in IE
		      !!$( event.target ).closest( ".cke_dialog, .cke_dialog_background_cover, .cke" ).length;
		  }
		});
}
	
	$(issueData).each(function(i, elt){
		var cdata=this;
		li=$('<li>');
		li.hover(function(){$(this).css("background-color","yellow");},function(){$(this).css("background-color","");});
		li.append($('<DIV>').addClass('issue_title').append('<span class="issueyear">'+this.issueyear+'</span>/'+
				'<span class="issueterm">'+this.issueterm+'</span>- '+
				'<span class="issuetitle">'+this.issuetitle+'</span>'+
				' <span class="issueautherc">'+this.issueautherc+'(c)</span>,'+
				' <span	class="issueauther">'+this.issueauther+'</span>'))
				
		.prepend($('<a href="javascript:void(0);">').click(function(){
			$(this).closest('li').find('.issue_abstracts').remove();
			var ab=$('<div class="issue_abstracts">');
			ab.appendTo($(this).closest('li'));
			ab.prepend($('<a href="javascript:void(0);">').click(function(){
				var val=$(this).data('abstract-data');
				$('form#_form_article')[0].reset();
				if(CKEDITOR.instances['abstract']){
					CKEDITOR.instances['abstract'].setData('', function() { this.updateElement(); });
				}
				$('form#_form_article input[name=issueid]').val(_issueid);
				$('#add_title').dialog('open');
			}).text('Add Article'));
			var _issueid=$(this).data('issue-data').issueid;
			$.ajax({
				url:'/issue-abstracts.php?issueid='+_issueid				
			}).success(function(data){
				if(!data || data.length==0){
					ab.append('<br/>No Articles found.')
				}
				var abul=$('<ul>').appendTo(ab);
				$(data).each(function(i,val){
					abul.append($('<li>')

							.hover(function(){$(this).css("background-color","pink");},function(){$(this).css("background-color","");})
					.append($('<h4>').html(val.articletitle))
							.append($('<div>').html(val['abstract'])
									.prepend($('<a href="javascript:void(0);">').click(function(){
								var val=$(this).data('abstract-data');

								$('form#_form_article')[0].reset();
								if(CKEDITOR.instances.abstract){
//									CKEDITOR.instances.abstract.setData('', function() { this.updateElement(); });
								}
								$('form#_form_article input[name=articleid]').val(val.articleid);
								$('form#_form_article input[name=articletitle]').val(val.articletitle);
								$('form#_form_article input[name=auther]').val(val.auther);
								$('form#_form_article input[name=aricledate]').val(val.aricledate);
								$('form#_form_article input[name=abstract]').val(val['abstract']);
								$('form#_form_article input[name=articleimage]').val(val.articleimage);
								$('form#_form_article input[name=issueid]').val(val.issueid);

								if(CKEDITOR.instances.abstract){
									CKEDITOR.instances.abstract.setData(val.abstract, function() { this.updateElement(); });
								}
								$('#add_title').dialog('open');
							}).text('Edit Article').data('abstract-data',val))));
				});
			});
			
		}).data('issue-data',cdata).text('Articles')).prepend($('<a href="javascript:void(0);">').click(function(){
			var cdata=$(this).data('issue-data');
			f=$('#add_issue');
			$('#add_issue #_form_issue')[0].reset();
			f.find('input[name=issueid]').val(cdata.issueid);
			opt=f.find('select[name=issueyear] option[value='+cdata.issueyear+']').prop('selected','selected');;
			if(opt.length==0){
				f.find('select[name=issueyear]').append($('<option>').val(cdata.issueyear).text(cdata.issueyear).prop('selected','selected'))
			}

			f.find('input[name=issueterm]').val(cdata.issueterm);
			f.find('input[name=issuetitle]').val(cdata.issuetitle);
			f.find('input[name=iscurrentissue][value='+cdata.iscurrentissue+']').prop('checked','checked');
			f.find('input[name=issueautherc]').val(cdata.issueautherc);
			f.find('input[name=issueauther]').val(cdata.issueauther);
			f.find('input[name=description]').val(cdata.description);
			$('#add_issue').dialog('open');
		}).data('issue-data',cdata).text('Edit'));
		$('#issue_ul').append(li);
	});
	$(newsData).each(function(i, elt){
		var cdata=this;
		li=$('<li>');
		li.append('<span class="publishdate">'+this.publishdate+'</span>/'+
				'<span class="newstitle">'+this.newstitle+'</span>')
				
		.prepend($('<a href="javascript:void(0);">').click(function(){
			var cdata=$(this).data('issue-data');
			f=$('#add_news');
			$('#add_news #_form_news')[0].reset();
			f.find('input[name=newsid]').val(cdata.newsid);
			f.find('input[name=newstitle]').val(cdata.newstitle);
			f.find('input[name=content]').text(cdata.content);
			if(CKEDITOR.instances.content){
				CKEDITOR.instances.content.setData(cdata.content, function() { this.updateElement(); });
			}
			f.find('input[name=status]').val(cdata.status);
			f.find('input[name=publishdate]').val(cdata.publishdate);
			f.dialog('open');
		}).data('issue-data',cdata).text('Edit'));
		$('#news_ul').append(li);
	});
});