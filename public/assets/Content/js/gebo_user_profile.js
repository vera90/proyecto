/* [ ---- Gebo Admin Panel - user profile ---- ] */

	$(document).ready(function() {
		//* enhanced select
		$("#user_languages").chosen();
		//* textarea autosize
		$('#u_signature').autosize();

		//* enhanced select
		gebo_chosen.init();
	});

	gebo_chosen = {
		init: function(){
			$(".chzn_a").chosen({
				allow_single_deselect: true
			});
		}
	};
